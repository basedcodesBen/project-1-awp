<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnivUser extends Model
{
    use HasFactory;

    protected $table = 'univ_user';

    protected $fillable = [
        'nrp',
        'password',
        'email',
        'name',
        'birthdate',
        'gender',
    ];
}
