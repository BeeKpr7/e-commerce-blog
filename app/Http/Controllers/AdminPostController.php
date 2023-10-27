<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function create ()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store ()
    {
        Post::create(array_merge($this->validatePost(),[
            'user_id' => auth()->id(),
            'image' => request()->file('image')->store('/posts/images')
        ]));

        return redirect('/admin/posts')->with('success','Post created successfully');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes=$this->validatePost($post);

        if($attributes['image'] ?? false){
            $attributes['image'] = request()->file('image')->store('/posts/images');
        }

        $post->update($attributes);

        return redirect('/posts/'.$post->slug)->with('success','Post updated successfully');
    }
    public function destroy (Post $post)
    {
        $post->delete();
        return back()->with('success','Post deleted successfully');
    }

    protected function validatePost(?Post $post=null)
    {
        $post = $post ?? new Post();
        $attributes = request()->validate([
            'title' => ['required','min:3','max:255',Rule::unique('posts','title')->ignore($post)],
            'excerpt' => 'required',
            'image' => $post->exist ? 'image':'required|image',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $attributes['slug'] = Str::slug($attributes['title'],'-');
        return $attributes;
    }
}
