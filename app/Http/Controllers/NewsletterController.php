<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;
use Exception;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);
        
        try {

            $newsletter->subscribe(request('email'));

        }catch(Exception $e){
        
            throw ValidationException::withMessages([
                'email' => 'This email can\'t subscribe to our newsletter'
            ]);
        }

        return redirect('/')->with('success','You are now signed up for our newsletter!');
    }
}
