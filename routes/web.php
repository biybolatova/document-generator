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
//Переход на главную страницу
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/save', function () {
    return view('save');
})->name('save');

Route::post('/save', 'DocController@submit')->name('save-contracts'); 
Route::get('/save', 'DocController@all')->name('all-contracts'); 
Route::get('views/{id}', 'DocController@download'); 

