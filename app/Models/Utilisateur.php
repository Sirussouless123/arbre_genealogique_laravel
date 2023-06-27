<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'mail',
        'birth_date',
        'birth_city',
        'pwd',
        'code',
        'typemembre_id',
    ];
}
