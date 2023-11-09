<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sku extends Model
{
    use HasFactory;

    protected array $fillable = [
        'name',
        'stock',
        'price',
        'weight',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}