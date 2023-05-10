<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datamodul extends Model
{
    use HasFactory;

    protected $fillable = [
        'ringno',
        'la',
        'lo',
        'backtime',
        'clubno',
        'raceno',
        'deviceno'
    ];
}