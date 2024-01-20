<?php

use App\Http\Controllers\PostController;
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


/* Route::get('/', function () {
    return view('home');
}); */

Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::post('/store', [PostController::class,'store'])->name('posts.store');
Route::put('/update/{post}', [PostController::class,'update'])->name('posts.update');
Route::delete('/destroy/{post}', [PostController::class,'destroy'])->name('posts.destroy');
Route::get('checkTodo/{id}', [PostController::class,'checkTodo'])->name('checkTodo');
Route::get('getCompleted', [PostController::class,'getCompleted'])->name('getCompleted');
Route::get('getIncompleted', [PostController::class,'getIncompleted'])->name('getIncompleted');
Route::get('selectAll', [PostController::class,'selectAll'])->name('selectAll');
Route::get('deselectAll', [PostController::class,'deselectAll'])->name('deselectAll');
 