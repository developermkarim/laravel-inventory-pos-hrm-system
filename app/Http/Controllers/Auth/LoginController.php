<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function login(){



        if(isset($_COOKIE['language']))
            \App::setLocale($_COOKIE['language']);
        else
            \App::setLocale('en');
        //getting theme

        /* Theme Dark Mode Or Light Mode Switching */

        if(isset($_COOKIE['theme']))

        $theme = $_COOKIE['theme'];

        else

        $theme = 'light';

        // Get general setting value
        $general_setting = Cache::remember('general_setting', 60*60*24*365, function (){
            return DB::table('general_settings')->latest()->get();

        });

        if(!$general_setting){

            DB::unprepared(file_get_contents('public/tenant_necessary.sql'));
            $general_setting = Cache::remember('general_setting' , 60*60*24*365, function (){
                return DB::table('general_setting')->latest()->get();
            });
        }

        return view("auth.login", compact("theme", 'general_setting'));
    }

    public function loginCreate(LoginRequest $request){

        if(Auth::attempt($request->validated(), $request->filled('remember'))){

            $request->session()->regenerate();
            return redirect()->intended('dashboard');

        }

        return back()->withErrors(['email' => 'Invalid Credentials']);

    }

    public function logout(Request $request){

        Auth::logout(); // logs out the user.
        $request->session()->invalidate(); // 2. Invalidates the session (security step)
        $request->session()->regenerateToken(); // 3. Regenerates CSRF token (prevents token reuse of old token )

        return redirect('/login')->with('success', 'Logged out successfully'); // 4. Redirect with the message.
    }

}
