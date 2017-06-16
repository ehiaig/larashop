<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'price',
        'preview_photo',
        'brand_id',
        'slug',
        'category_id'
    ];

    public $timestamps = true;

    public function category()
    {   //the belongsTp tells us that each challenge belong to a category
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {   //the belongsTp tells us that each challenge belong to a category
        return $this->belongsTo('App\Brand');
    }
    

    public function user()
    {//each challenge belong to a user
      return $this->belongsTo('App\User');
    }
/*
    public function idea()
    {
        return $this->HasMany('App\Idea');
    } */

    public function searchableAs()
    {
        return 'products_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
