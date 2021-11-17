<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'chef';

    protected $primaryKey = 'ID';
    
    public $timestamps = false;

	protected $fillable = [
        'ID',
        `USERNAME`,
        `ChName`,
        `PHONE`,
        `CMND`,
        `BIRTHDATE DATE`,
        `PWD`,
        `IMG_URL`
	];

	protected $guarded = [];
}
