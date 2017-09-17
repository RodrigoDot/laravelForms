<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const CIVIL_STATE = [
      1 => 'Single',
      2 => 'Married',
      3 => 'Separated'
    ];
}
