<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangaugaeController;
use Intervention\Image\Facades\Image;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("guest")->group(function(){

    Route::get('/register' , [RegisterController::class, 'register']);
    Route::post('register', [RegisterController::class,'registerCreate'])->name('register');

     Route::get('/login', [LoginController::class, 'login']);
     Route::post('login', [LoginController::class,'loginCreate'])->name('login');
});




 Route::group(['middleware' => ['auth', 'common']], function() {

    Route::controller(LangaugaeController::class)->group(function(){
        Route::get('language-switch/{locale}' , 'switchLangauge')->name('language.switch');
    });

    Route::controller(HomeController::class)->group(function(){

    Route::get('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/switch-theme/{theme}', 'switchTheme')->name('switchTheme');

    Route::post('/logout', [LoginController::class,'logout'])->name('logout');

    Route::controller(CategoryController::class)->group(function(){

        Route::post('import' , 'import')->name('category.import');
    });

    Route::resource('category', CategoryController::class);

});


});


