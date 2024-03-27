<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnivUser extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nrp',
        'password',
        'email',
        'name',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
}
