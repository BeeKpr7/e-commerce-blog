<?php

namespace App\Http\Controllers;

use Validator;
use App\Comment;
use App\Models\Post;
use App\Mail\CommentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function enconstruction(){

        return view('public.enconstruction');
    }
    public function home(){

        return view('public.home');
    }

    public function contact(){

        return view('public.contact');
    }

    public function lamiellerie(){

        return view('public.lamiellerie',[
            'products' => \App\Models\Product::active()->get()
        ]);
    }
    public function notrehistoire(){

        return view('public.notrehistoire');
    }
    public function mentionslegals(){

        return view('public.mentionslegals');
    }

    public function laruche(){

        return view('public.la-ruche', [
            'posts' => 
                Post::latest()->filter(request(['search','category','author']))
                ->paginate(6)->withQueryString()
        ]);
    }
}