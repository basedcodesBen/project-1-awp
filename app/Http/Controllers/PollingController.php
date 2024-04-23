<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polling;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\PollingDetail;

class PollingController extends Controller
{
    /**
     * Show the form for creating a new poll.
     *
     * @return \Illuminate\View\View
     */
    public function createForm()
    {
        $nextPollId = $this->getNextPollId();
        // $mataKuliahs = MataKuliah::all();

        return view('layouts.polling.create', compact('nextPollId'));
    }

    /**
     * Store a newly created poll in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function showPoll()
     {
         $polls = Polling::where('tgl_mulai', '<=', now())
            ->where('tgl_selesai', '>=', now())
            ->get();

        return view('layouts.polling.show', compact('polls'));
     }

     public function store(Request $request)
     {
        // Validate the form data
         $validatedData = $request->validate([
             'judul_polling' => 'required',
             'tgl_mulai' => 'required|date',
             'tgl_selesai' => 'required|date|after:tgl_mulai',
         ]);

         // Get the next available id_polling value
         $id_polling = $this->getNextPollId();

         // Start a database transaction
         DB::beginTransaction();

         try {
             // Create a new poll
             $poll = new Polling([
                 'id_polling' => $id_polling,
                 'judul_polling' => $validatedData['judul_polling'],
                 'tgl_mulai' => $validatedData['tgl_mulai'],
                 'tgl_selesai' => $validatedData['tgl_selesai'],
                 'status' => 'active', // Set the default status
             ]);

             // Save the poll
             $poll->save();

             // Attach selected subjects to the poll
            //  foreach ($validatedData['mata_kuliahs'] as $kode_matkul) {
            //      $poll->mataKuliah()->attach($kode_matkul, ['nrp' => $nrp]);
            //  }

             // Commit the transaction
             DB::commit();

             return redirect()->route('poll.create')->with('success', 'Poll created successfully.');
         } catch (\Exception $e) {
             // Rollback the transaction on error
             DB::rollback();

             // Handle the error
             return redirect()->route('poll.create')->withInput()->with('error', 'Failed to create poll. Please try again.');
         }
     }

    /**
     * Get the next available id_polling value.
     *
     * @return int
     */
    private function getNextPollId()
    {
        $latestPoll = Polling::latest('id_polling')->first();
        if ($latestPoll) {
            return intval($latestPoll->id_polling) + 1;
        } else {
            // If no records found, return a default value
            return 1;
        }
    }

    public function showPollDetails($id)
    {
        // $pollingDetail = PollingDetail::where('id_polling', $id)->first();
        $poll = Polling::find($id);
        $matkul = MataKuliah::where('id_prodi', Auth::user()->id_prodi)
                        ->where('jumlah_sks', '<=', 9) // Ensure weight limit
                        ->get();
        return view('layouts.polling.poll-details', ['poll' => $poll, 'subjects' => $matkul]);

        // Check if the user is 'prodi' or 'admin'
        // if ($pollingDetail && Auth::user()->role === 'prodi') {
        //     $polls = Polling::all();
        //     $pollingDetail = PollingDetail::where('id_polling', $id)->first();
        //     // Retrieve the choices of subjects based on the array of subject codes
        //     $selectedSubjects = $pollingDetail->selected_subjects;
        //     $subjects = MataKuliah::whereIn('kode_matkul', $selectedSubjects)->get();

        //     return view('layouts.polling.poll-details-prodi', compact('subjects', 'poll'));
        // } else {
        //     // Display the form for students to fill out the polling
        //     $poll = Polling::find($id);
        //     $matkul = MataKuliah::all(); // Assuming you have a Subject model
        //     return view('layouts.polling.poll-details', ['poll' => $poll, 'subjects' => $matkul]);

        //     return view('layouts.polling.poll-details', compact('subjects', 'id', 'poll'));
        // }
    }

    public function showProdi()
    {
        $polls = Polling::all();

        return view('layouts.polling.showdetails', compact('polls'));
    }

    public function viewResults($id_polling)
    {
        // Get the id_prodi of the authenticated prodi user
        $id_prodi = Auth::user()->id_prodi;

        // Query the polling details for the specified id_polling and the subjects associated with the id_prodi
        $pollingDetails = PollingDetail::where('id_polling', $id_polling)
            ->whereIn('kode_matkul', function ($query) use ($id_prodi) {
                $query->select('kode_matkul')
                    ->from('mata_kuliah')
                    ->where('id_prodi', $id_prodi);
            })
            ->get();

        // Count the number of votes for each subject
        $voteCounts = $pollingDetails->groupBy('kode_matkul')->map->count();

        // Get a list of students and their voted subjects
        $studentVotes = $pollingDetails->groupBy('nrp')->map(function ($votes) {
            return $votes->pluck('kode_matkul')->toArray();
        });

        // Get the names of subjects based on their kode_matkul
        $subjectNames = MataKuliah::whereIn('kode_matkul', $pollingDetails->pluck('kode_matkul')->unique())
            ->pluck('nama_matkul', 'kode_matkul');

        // Get the names of students based on their nrp
        $studentNames = User::whereIn('nrp', $pollingDetails->pluck('nrp')->unique())
            ->pluck('name', 'nrp');

        return view('layouts.polling.poll-details-prodi', compact('voteCounts', 'studentVotes', 'subjectNames', 'studentNames'));
    }

    public function vote(Request $request) {
        // Validate the form data
        $validatedData = $request->validate([
            'id_polling' => 'required',
            'selected_subjects' => 'required|array',
            'selected_subjects.*' => 'exists:mata_kuliah,kode_matkul',
        ]);
    
        // Retrieve the user's ID
        $userId = Auth::user()->nrp;
    
        // Check if the user has already voted
        $pollDet = PollingDetail::where('nrp', $userId)->first();
        if ($pollDet) {
            return redirect()->back()->with('error', 'Anda sudah melakukan polling!');
        }
    
        // Calculate the total weight of selected subjects
        $totalWeight = MataKuliah::whereIn('kode_matkul', $validatedData['selected_subjects'])->sum('jumlah_sks');
    
        // Check if the total weight exceeds the maximum limit
        if ($totalWeight > 9) {
            return redirect()->back()->with('error', 'Jumlah SKS tidak boleh melebihi 9.');
        }
    
        // Create a new poll detail record for each selected subject
        foreach ($validatedData['selected_subjects'] as $subjectCode) {
            PollingDetail::create([
                'id_polling' => $validatedData['id_polling'],
                'kode_matkul' => $subjectCode,
                'nrp' => $userId,
            ]);
        }
    
        // Redirect back to the polls page or show a success message
        return redirect()->route('poll.show')->with('success', 'Your vote has been recorded successfully.');
    }
}
