<?php

namespace App\Http\Controllers;

use App\Models\UnivUser;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class UnivUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UnivUser::all();
        return view("uuser.index", ['users' => $data]);
    }

    public function create()
    {
        return view('uuser.create');
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
        // UnivUser::create($validatedData);
        $uuser = new UnivUser ($validatedData);
        $uuser->save();
        return redirect(route('uuser-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
