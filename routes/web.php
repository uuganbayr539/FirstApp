<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers;


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

Route::get("/", [PagesController::class, 'index']);
Route::get("/about", [PagesController::class, 'about']);
Route::get("/services", [PagesController::class, 'services']);
Route::get("/main", [PagesController::class, 'main']);
Route::get("/admin", [PagesController::class, 'admin']);

 
Route::resource('posts', PostsController::class);
Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');
Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');

    Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Route::get('send-mail',[MailController::class,'index']);