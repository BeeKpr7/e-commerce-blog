<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'price',
        'weight',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getNameAttribute()
    {
        return ucwords($this->product->name).' - '.$this->weight.' g';
    }

    // public function getPriceAttribute($price)
    // {
    //     return Number::currency($price/100,'EUR');
    // }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
