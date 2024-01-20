<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// metodi con ritorno

Route::get('/es1', function () {
    // return DB::table('players')->get();
    // return DB::table('players')->first();
    // return DB::table('users')->value('name');
});

Route::get('/es2', function () {
    return DB::table('users')->count();
    // return DB::table('players')->min('age');
    // return DB::table('players')->max('age');
    // return DB::table('players')->avg('age');
    // return DB::table('players')->sum('id');
});

Route::get('/es3/{id}', function ($id) {
    return DB::table('players')->find($id);
});

