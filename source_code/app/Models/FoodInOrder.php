<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodInOrder extends Model
{
    protected $table = 'foodin_order';
    
    public $timestamps = false;

	protected $fillable = [
        'FID',
        'ORDER_ID',
        'QUANTITY',
        'DESCRIPT'
	];
}
