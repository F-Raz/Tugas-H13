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

Route::get('/', function () {
    return view('table');
});

Route::get('/datatable', function(){
    return view('datatable');
});

// Route::get('/castList', function(){
//     return view('castList');
// });

Route::get('/castList',[castController::class, 'showcast']);

Route::get('/castList/create', function(){
    return view('menu.create');
});

Route::post('/createCast',[castController::class, 'store']);
Route::delete('/castList/{cast}',[castController::class, 'delete']);
Route::get('/castList/edit/{cast}',[castController::class, 'edit']);
Route::put('/castList/{cast}',[castController::class, 'update']);