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

Route::get('/es1', function () {
    return DB::select('select * from users');
});

Route::get('/es2', function () {

    return  DB::statement('drop table users');
});

// selezione con binding del campo
Route::get('oravediamo', function () {
    // inserimento del dato diretto
    return DB::select('select * from players where id = ?', [1]);
    // inserimento del dato con variabile
    $id = 1;
    return DB::select('select * from players where id = :id', ['id' => $id]);
});

// Metodo insert
Route::get('new_role', function () {
    return DB::insert('insert into roles (name, created_at, updated_at) values (?, ?, ?)', ['regista', now(), now()]);
});

// Metodo update
Route::get('update_role', function () {
    // return DB::update('update users set name = Paolo where id = ?', [1]);
    return DB::update('update roles set name = ? where id = ?', ['Paolo', 6]);
});

// Metodo delete
Route::get('delete_role', function () {
    // cancellazione singolo item con inserimento diretto del dato
    // return DB::delete('delete from players where name = ?', ['John']);

    // cancellazione singolo item con binding di variabile
    $name = 'Paolo';
    return DB::delete('delete from roles where name = :name', ['name' => $name]);
});
