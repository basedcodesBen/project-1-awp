<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        // Retrieve data from the database
        $data = MataKuliah::all();

        // Pass data to the view
        return view('layouts.prodi.matkul', compact('data'));
    }
    public function create(){
        return view('layouts.prodi.tambahmatkul');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_matkul' => 'required|string|max:255',
            'tahun_kurikulum' => 'required|string|max:255',
            'nama_matkul' => 'required|string|max:255',
            'jumlah_sks' => 'required|integer|max:99999999999',
        ]);
        MataKuliah::create($validatedData);
        return redirect('/matakuliah');
    }
    public function remove(Request $request)
    {
        $Value = $request->input('kode_matkul');

        MataKuliah::where('kode_matkul', $Value)->delete();
        return redirect('/matakuliah');
    }
}
