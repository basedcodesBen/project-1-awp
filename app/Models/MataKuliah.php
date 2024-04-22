<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'kode_matkul',
        'tahun_kurikulum',
        'nama_matkul',
        'jumlah_sks',
    ];

    protected $primaryKey = 'kode_matkul';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    public $incrementing = false;
}
