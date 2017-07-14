<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'im', 'free_shipping', 'description', 'price', 'category_id'];

    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
