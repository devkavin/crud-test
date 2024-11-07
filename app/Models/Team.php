<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id',
        'conference',
        'division',
        'city',
        'name',
        'full_name',
        'abbreviation',
    ];
}
