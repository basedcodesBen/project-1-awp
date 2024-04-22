<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';

    protected $fillable = [
        'id_polling',
        'judul_polling',
        'tgl_mulai',
        'tgl_selesai',
        'status',
    ];

    protected $primaryKey = 'id_polling';

    // public function pollingDetails()
    // {
    //     return $this->hasMany(PollingDetail::class, 'id_polling');
    // }

    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'polling_detail', 'id_polling', 'kode_matkul')
                    ->withPivot('nrp'); // Include additional pivot table columns
    }

    
}
