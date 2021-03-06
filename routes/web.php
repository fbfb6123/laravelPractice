<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Sample\SampleController;
use App\Http\Controllers\StbController;
use App\Http\Controllers\Stb2Controller;
use App\Http\Middleware\HelloMiddleware;
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

/*Route::middleware([HelloMiddleware::class])->group(function (){*/ //ミドルウェア
/*Route::resource('/hello',HelloController::class);*/
//数字のみを指定できるIDパラメータ
/*Route::get('/hello/{id}',[HelloController::class, 'index'])->where('id','[0-9]+');*/
Route::get('/hello/other',[HelloController::class, 'other']);
Route::get('/hello/{id}',[HelloController::class, 'index'])->name('hello')
    ->middleware(App\Http\Middleware\MyMiddleware::class);
Route::get('/hello',[HelloController::class, 'index'])
->middleware(App\Http\Middleware\MyMiddleware::class);
/*});*/

Route::namespace('Sample')->group(function () {
    Route::get('/sample',[SampleController::class, 'index'])->name('sample');
    Route::get('/sample/other',[SampleController::class, 'other']);
});

Route::get('/hello2',[StbController::class, 'index'])->name('stb');
Route::get('/hello2/{id}',[StbController::class, 'index'])->name('stb');


//EloquentとCollection
Route::get('/hello3',[Stb2Controller::class, 'index'])->name('stb2');



/*Route::get('/hello/{person}',[HelloController::class, 'index']);20P*/
