<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TopicController;
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
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('topic', TopicController::class);

    
    Route::get('/rspn', function () {
        return view('pagaes.response');
    });
    
    Route::get('/saved', function () {
        return view('pages.saved');
    });
    
    Route::get('/yt', function () {
        return view('pages.yourthread');
    });
    
    Route::get('/profile', function () {
        return view('pages.profile');
    });
});



// require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
