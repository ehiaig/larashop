<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    public $fillable = ['title','slug'];

    public function product()
    {	//the hasMany tells us that each category can have many products
    	return $this->hasMany('App\Product');
    }

    public $timestamps = true;
}
