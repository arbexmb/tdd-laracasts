<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $products = [];

    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    public function products()
    {
        return $this->products;
    }

    public function total()
    {
        return array_reduce($this->products, function($carry, $product){
            return $carry + $product->cost();
        });
    }
}
