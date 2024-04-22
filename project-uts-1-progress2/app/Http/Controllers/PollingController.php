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
        //  // Retrieve all polls
        //  $polls = Polling::all();
     
        //  // Pass the polls data to the view
        //  return View::make('layouts.polling.show', compact('polls'));
        // Get active polls
        $polls = Polling::where('tgl_mulai', '<=', now())
            ->where('tgl_selesai', '>=', now())
            ->get();

        return view('layouts.polling.show', compact('polls'));
     }

     public function store(Request $request)
     {
         // Retrieve the authenticated user's nrp
         $nrp = Auth::user()->nrp;
     
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

    // public function showPollDetails($id) {
    //     $poll = Polling::find($id);
    //     $matkul = MataKuliah::all(); // Assuming you have a Subject model
    //     return view('layouts.polling.poll-details', ['poll' => $poll, 'subjects' => $matkul]);
    // }

    public function showPollDetails($id)
    {
        $poll = Polling::find($id);
        $pollingDetail = PollingDetail::where('id_polling', $id)->first();

        // Check if the user is 'prodi' or 'admin'
        if ($pollingDetail && Auth::user()->role === 'prodi') {
            // Retrieve the choices of subjects based on the array of subject codes
            $selectedSubjects = $pollingDetail->selected_subjects;
            $subjects = MataKuliah::whereIn('kode_matkul', $selectedSubjects)->get();

            return view('layouts.polling.poll-details-prodi', compact('subjects', 'poll'));
        } else {
            // Display the form for students to fill out the polling
            $poll = Polling::find($id);
            $matkul = MataKuliah::where('id_prodi', Auth::user()->id_prodi)
                        ->where('jumlah_sks', '<=', 9) // Ensure weight limit
                        ->get();
            return view('layouts.polling.poll-details', ['poll' => $poll, 'subjects' => $matkul]);
        
            // return view('layouts.polling.poll-details', compact('subjects', 'id', 'poll'));
        }
    }

    public function vote(Request $request, $id) {
        // Validate the form data
        $validatedData = $request->validate([
            'selected_subjects' => 'required|array',
            'selected_subjects.*' => 'exists:mata_kuliah,kode_matkul',
        ]);
    
        // Retrieve the user's ID
        $userId = Auth::user()->id;
    
        // Create a new poll detail record for each selected subject
        foreach ($validatedData['selected_subjects'] as $subjectCode) {
            // dd($subjectCode);
            PollingDetail::create([
                'id_polling' => $id,
                'kode_matkul' => $subjectCode,
                'nrp' => $userId, // Assuming 'nrp' is the field to store the user's ID
            ]);
        }
    
        // Redirect back to the polls page or show a success message
        return redirect()->route('poll.voteMenu')->with('success', 'Your vote has been recorded successfully.');
    }
}