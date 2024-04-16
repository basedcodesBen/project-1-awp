<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class UnivUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view("layouts.user.index", ['users' => $data]);
    }

    public function create()
    {
        $programs = ProgramStudi::all(); // Get all programs
        return view('layouts.user.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $idprodi = ProgramStudi::orderBy('id_prodi')->get();

        $validatedData = validator($request->all(), [
            'nrp' => 'required|string|max:7|unique:users',
            'role' => 'required|string|max:10',
            'id_prodi' => 'required|string|max:2|exists:program_studi,id_prodi',
            'password' => 'required|string|max:10',
            'email'=> 'string|max:255',
            'name' => 'required|string|max:255',
        ], [
            'nrp.required' => 'NRP harus diisi!',
            'nrp.unique' => 'NRP sudah terdaftar, silakan diganti dengan nomor lain',
            'role_required' => 'Role harus diisi!',
            'id_prodi_required' => 'ID Prodi harus diisi!',
            'password' => 'Password harus diisi!',
            'name' => 'Nama harus diisi!',
        ])->validate();

        // dd($validatedData);
        // User::create($validatedData);
        $user = new User ($validatedData);
        $user->save();
        return redirect(route('user-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(User $user)
    {
        $programs = ProgramStudi::all(); // Get all programs
        return view('layouts.user.edit', ['user' => $user], compact('programs'));
        // return view('user.edit', [
        //     'user' => $user,
        //     'programs' => $programs
        // ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = validator($request->all(), [
            'role' => 'required|string|max:10',
            'id_prodi' => 'required|string|max:2|exists:program_studi,id_prodi',
            'password' => 'required|string|max:10',
            'email'=> 'string|max:255',
            'name' => 'required|string|max:255',
        ], [
            'role_required' => 'Role harus diisi!',
            'id_prodi_required' => 'ID Prodi harus diisi!',
            'password' => 'Password harus diisi!',
            'name' => 'Nama harus diisi!',
        ])->validate();

        // dd($validatedData);
        // User::create($validatedData);
        $user->update($validatedData);
        return redirect(route('user-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user-index'));
    }

    public function dashTemp()
    {
        return view('pages.admin.dashboard');
    }
}
