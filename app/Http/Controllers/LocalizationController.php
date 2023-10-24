<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($locale, Request $request)
    {
        
        if (! in_array($locale, config('localization.locales'))) {
            abort(400);
        }
    
        session(['localization' => $locale]);

        return redirect()->back();
    }
}
