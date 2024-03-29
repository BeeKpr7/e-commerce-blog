<?php
namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store($attributes) : Post
    {
        $post = Post::create(array_merge($attributes,[
            'image' => $attributes['image']->store('/images/posts/'.$attributes['title'])
        ]));

        $post->categories()->attach($attributes['categories']);

        return $post;
    }

    public function update(Post $post, $attributes) : Post
    {
        if($attributes['image'] ?? false){
            $attributes['image'] = $attributes['image']->store('/images/posts/'.$attributes['title']);
        }

        $post->update($attributes);

        $post->categories()->sync($attributes['categories']);

        return $post;
    }

    public function destroy(Post $post) : void
    {
        $post->delete();
    }
}