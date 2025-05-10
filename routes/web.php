<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('post/create', [\App\Http\Controllers\PostController::class, 'create']);
Route::get('post/update', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('post/delete', [\App\Http\Controllers\PostController::class, 'delete']);
Route::get('post/firstOrCreate', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('post/updateOrCreate', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');



