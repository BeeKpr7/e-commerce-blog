<?php

namespace App\Models;

use App\Models\Product;
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
}
