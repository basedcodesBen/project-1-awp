<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    use HasFactory;

    protected $table = 'polling_detail';

    protected $fillable = [
        'id_polling',
        'kode_matkul',
        'nrp',
        'created_at',
        'updated_at',
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul');
    }

    public function userNRP()
    {
        return $this->belongsTo(User::class, 'nrp');
    }
}
