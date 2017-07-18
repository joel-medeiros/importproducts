<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Product extends Model
{
    use PresentableTrait;

    protected
        $fillable = ['name', 'lm', 'free_shipping', 'description', 'price', 'category_id'],
        $presenter = "App\Presenters\ProductPresenter";

    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
