<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){

        if(Auth::user()){};
}


    public function dashboard(){


        return view("backend.index");
    }



    /* To do Dark Mode to Light Mode or Light To Dark */

   public function switchTheme($theme){

       setcookie('theme' , $theme , time() + (86400 * 365), "/");

   }

/*     public function switchTheme($theme)
{
    if (!in_array($theme, ['light', 'dark'])) {
        return response()->json(['error' => 'Invalid theme'], 400);
    }

    return response()->json(['status' => 'Theme changed to ' . $theme])
        ->cookie('theme', $theme, 60 * 24 * 365, '/'); // 1 year
} */



}
