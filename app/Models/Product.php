<?php

namespace App\Models;

use App\Models\Sku;
use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'place',
        'image',
        'slug',
        'category_id',
        'status'
    ];

    protected $casts=[
        'status' => ProductStatus::class
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders ()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function skus ()
    {
        return $this->hasMany(Sku::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
