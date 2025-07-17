<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangaugaeController extends Controller
{

    public function switchLangauge($locale){

        // Optional: Save in DB if user is logged in

        if(auth()->check()){
            auth()->user()->update(['preferred_locale' => $locale]);
        }

        // Save in cookie for guests or fallback
        
        setcookie('language' , $locale , time() + (86400 * 365) , '/');

        return redirect()->back();
    }
}
