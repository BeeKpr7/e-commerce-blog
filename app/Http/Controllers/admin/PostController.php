<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Validation\Rule;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function __construct(
        private PostService $postService
    ){}
    
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

    public function store (PostRequest $request)
    {   
        $this->postService->store($request->validated());

        return redirect('/admin/posts')->with('success',__('post.infos.added'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $post = $this->postService->update($post, $request->validated());

        return redirect('/posts/'.$post->slug);//->with('success','Post updated successfully');
    }
    public function destroy (Post $post)
    {
        $this->postService->destroy($post);

        return back()->with('success',__('post.infos.deleted'));
    }

}
