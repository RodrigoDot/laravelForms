<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const CIVIL_STATES = [
      1 => 'Single',
      2 => 'Married',
      3 => 'Separated'
    ];

    protected $fillable = [
        'name',
        'document',
        'email',
        'phone',
        'defaulting',
        'born',
        'genre',
        'civil_state',
        'disabled',
        'fantasy_name'
    ];
}
