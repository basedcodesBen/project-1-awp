<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatkulController extends Controller
{
    public function index()
    {
        // Retrieve data from the database
        $user = Auth::user();
        $prodi = $user->id_prodi;
        $data = MataKuliah::where('id_prodi',$prodi)->get();
        // Pass data to the view
        return view('layouts.prodi.matkul', compact('data'));
    }
    public function create()
    {
        $user = Auth::user();
        $data = $user->id_prodi;
        $kurikulums = Kurikulum::all();
        return view('layouts.prodi.tambahmatkul',compact('data', 'kurikulums'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_matkul' => 'required|string|max:255',
            'id_prodi' => 'required|string|max:255',
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
