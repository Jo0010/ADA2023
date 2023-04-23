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

Route::resource('admins', App\Http\Controllers\AdminController::class);
Route::resource('comments', App\Http\Controllers\CommentController::class);
Route::resource('images', App\Http\Controllers\ImageController::class);
Route::resource('projects', App\Http\Controllers\ProjectController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('controller', App\Http\Controllers\Controller::class);

Route::get('/press', [App\Http\Controllers\CommentController::class, 'index']);
Route::get('/gallery',[App\Http\Controllers\ProjectController::class,'show'] );

Route::controller(App\Http\Controllers\ImageController::class)->group(function(){
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'store')->name('image.store');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/legal', function () {
    return view('legal');
});



Route::get('/contact', function () {
    return view('contact');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
