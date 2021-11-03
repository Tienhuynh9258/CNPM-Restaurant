<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';

    protected $primaryKey = 'ID';
    
    public $timestamps = false;

	protected $fillable = [
        'ID',
        'FNAME',
        'PRICE',
        'INGREDIENTS',
        'IMAGE'
	];

	protected $guarded = [];
}
