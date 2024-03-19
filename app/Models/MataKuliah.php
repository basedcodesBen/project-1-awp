<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'jumlah_sks',
    ];
}
