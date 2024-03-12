<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';

    protected $fillable = [
        'judul_polling',
        'tgl_mulai',
        'tgl_selesai',
        'status',
    ];
}
