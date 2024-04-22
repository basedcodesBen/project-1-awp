<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramStudi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProgramStudi::all();
        return view("layouts.prodi.index", ['prodis' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id_prodi' => 'required|string|max:2|unique:program_studi',
            'nama_prodi'=> 'required|string|max:255',
        ], [
            'id_prodi.required' => 'ID Program Studi harus diisi!',
            'id_prodi.unique' => 'ID Program Studi sudah terdaftar, silakan diganti dengan nomor lain',
            'nama_prodi.required' => 'Nama Program Studi harus diisi!',
        ])->validate();

        $prodi = new ProgramStudi ($validatedData);
        $prodi->save();
        return redirect(route('prodi-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramStudi $prodi)
    {
        return view('layouts.prodi.edit', ['prodi'=>$prodi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramStudi $prodi)
    {
        $validatedData = validator($request->all(), [
            'nama_prodi'=> 'required|string|max:255',
        ], [
            'nama_prodi.required' => 'Nama Program Studi harus diisi!',
        ])->validate();

        $prodi->update($validatedData);
        return redirect(route('prodi-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramStudi $prodi)
    {
        $prodi->delete();
        return redirect(route('prodi-index'));
    }
}
