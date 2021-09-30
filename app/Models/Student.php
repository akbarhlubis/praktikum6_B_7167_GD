<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $filltable = [
        'nama',
        'tempat_lahir',
        'alamat'
    ];
}
