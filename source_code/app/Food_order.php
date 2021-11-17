<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_order extends Model
{
    
    protected $table = 'food_orders';

    protected $primaryKey = 'ID';
    
    public $timestamps = false;

	protected $fillable = [
        'STATUS',
        'TOTAL',
        'TIPS',
        'created_at',
	];
}
