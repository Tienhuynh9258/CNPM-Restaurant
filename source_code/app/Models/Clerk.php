<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{
    protected $table = 'clerk';

    protected $primaryKey = 'ID';
    
    public $timestamps = false;

    protected $fillable = [
        'ID',
        `USERNAME`,
        `CName`,
        `PHONE`,
        `CMND`,
        `BIRTHDATE DATE`,
        `PWD`,
        `IMG_URL`
    ];

    protected $guarded = [];
}
