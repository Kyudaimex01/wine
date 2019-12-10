<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    protected $fillable = [
        'name', 'lastname', 'ci', 'city', 'email', 'password'
    ];
}
