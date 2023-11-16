<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'image',
        'body',
        'slug',
        'user_id'
    ];
    
    protected $with = ['author','categories'];

    public function scopeFilter($query, array $filters)
    { 
        if ( $filters['search']??false) $filters['search'] = str_replace(' ', '%', $filters['search']);

        //dd($filters['search']);

        $query->when($filters['search']??false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title','like','%'.$search.'%')
                      ->orWhere('body','like','%'.$search.'%'))
                //   ->orWhere(fn($query)=>
                //        $query->whereHas('author',fn ($query) =>
                //             $query->where('username','like','%'.$search.'%'))
                //     )
                );
                    //    dd($query->toSql());
        $query->when($filters['category']??false,fn ($query, $category) =>
                $query->whereHas('categories',fn ($query) =>
                $query->where('slug',$category)));
         //dd($query->toSql());
                      
        $query->when($filters['author']??false,fn ($query, $author) =>
                $query->whereHas('author',fn ($query) =>
                $query->where('username',$author)));
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories ()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}
