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

// metodi vincolanti

Route::get('/es', function () {
    return DB::table('users')->get();

    // return USER::get();
    // return DB::table('users')->all();
    // return USER::all();

});

Route::get('/es1', function () {
    return DB::table('users')
        ->select('id', 'name')
        ->addSelect('email as indirizzo di posta')
        ->get();
});

Route::get('/es2', function () {
    return DB::table('players')
        ->where('age',  21)
        // ->where('age', '=' , 21)
        // ->where('role_id', '<', 3)
        // ->orWhere('role_id', '<', 3)
        // ->whereBetween('id', [5, 10])
        ->get();
});


// whereExist and whereNotExist

Route::get('/es3', function () {
    return DB::table('players')
        ->whereIn('role_id', [2, 3])
        // ->whereNotIn('role_id', [2, 3])
        ->select('name', 'surname')
        ->get();
});

Route::get('/es4', function () {
    return DB::table('users')
        ->select('name')
        // ->distinct()
        ->get();
});