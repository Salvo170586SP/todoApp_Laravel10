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

// metodi modificatori di output

Route::get('/es1', function () {
    return DB::table('users')
    ->orderBy('name', 'ASC')
    ->get();
});

Route::get('/es2', function () {
    return DB::table('users')
        ->selectRaw('role_id, count(*) as numero_per_ruoli')
        ->groupBy('role_id')
        ->having('role_id','>=', 0)
        ->get();
});

// $users = DB::table('users')
//                 ->groupBy('account_id')
//                 ->having('account_id', '>', 100)
//                 ->get();

Route::get('/es3', function () {
    return DB::table('users')
        ->inRandomOrder()
        ->get();
});