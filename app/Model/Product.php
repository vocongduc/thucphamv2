<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function CateProduct()
    {
        return $this->belongsTo('App\Model\CateProduct', 'cate_product', 'id');
    }
}
