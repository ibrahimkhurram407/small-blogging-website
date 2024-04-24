<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', function () {
    if(Auth::check()) {
        // If the user is authenticated
        return view('post');
    } else {
        // If the user is not authenticated
        return view('auth.login');
    }
})->name('post');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/home', [PostController::class, 'index'])->name('home');