<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function store($attributes) : Product
    {
        return  Product::create(array_merge($attributes,[
            'image' => $attributes['image']->store('/images/products'.$attributes['name'])
        ]));
    }

    public function update(Product $product, $attributes) : Product
    {
        if($attributes['image'] ?? false){
            $attributes['image'] = $attributes['image']->store('/images/products'.$attributes['name']);
        }

        $product->update($attributes);

        return $product;
    }

    public function destroy(Product $product) : void
    {
        $product->delete();
    }

}