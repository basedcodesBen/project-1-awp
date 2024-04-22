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
    ];

    protected $casts = [
        'kode_matkul' => 'array',
    ];

    public function kodePoll()
    {
        return $this->hasMany(Polling::class, 'id_polling');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matkul');
    }

    public function userNRP()
    {
        return $this->belongsTo(User::class, 'nrp');
    }
}
