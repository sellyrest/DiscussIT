<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    
    Route::get('/rspn', function () {
        return view('response');
    });
    
    Route::get('/saved', function () {
        return view('saved');
    });
    
    Route::get('/yt', function () {
        return view('yourthread');
    });
    
    Route::get('/profile', function () {
        return view('profile');
    });
});



// require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
