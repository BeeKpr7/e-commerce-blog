<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index ()
    {        
        return view('posts.index', [
            'posts' => 
                    // DB::select('select * from posts where exists (select * from categories inner join category_post on categories.id = category_post.category_id where posts.id = category_post.post_id and slug = ?)',["et-ea-quae-corrupti-non-et-id-eligendi"])
                Post::latest()->filter(request(['search','category','author']))
                ->paginate(9)->withQueryString()
        ]);
    }

    public function show (Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
