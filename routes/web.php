<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ArticlesController;

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

Route::resource('articles', ArticlesController::class);

Route::get('/', [WelcomeController::class, 'index']);


Route::get('/test', function () {
    return view('test');
});


Route::pattern('keyword','[0-9]{3}'); // 라우터 파라메터 무결성 처리

Route::get('/test/{keyword?}', function($keyword = ''){
    return $keyword; //echo 임
});

//라우터 데이터 바인딩
Route::get('/data-bind', function(){
    return view('test', [
       'name' => 'foo',
       'greeting' => 'Hello there'
    ]);
});
