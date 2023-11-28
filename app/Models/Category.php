<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts ()
    {
        return $this->hasMany(Post::class);
    }
    public function getNameAttribute($name)
    {
        return ucwords( $name );
    }

    public function products ()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
