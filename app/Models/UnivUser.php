<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramStudi;

class UnivUser extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nrp',
        'password',
        'email',
        'name',
        'id_prodi',
        'role',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }
}
