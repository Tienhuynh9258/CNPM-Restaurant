<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = 'food_category';

    public $timestamps = false;

	protected $fillable = [
        'FID',
        'CATEGORY'
	];

	protected $guarded = [];
}
