<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('auth/login', function(){
    // $cred = ['email'=> 'first@user.com','password'=>'1234'];
    if(!auth()->attempt($cred=[])) // ==> Auth::attempt() 동일
    {
        return '로그인 정보가 정확하지 않습니다.';
    }else{
        return redirect('protected');
    }
});

Route::get('protected', function(){

    // dump(session()->all()); // dump 는 echo 랑 같은 기능인듯
    //// dump(auth()->user()); // dump 는 echo 랑 같은 기능인듯
    ///
    if(!auth()->check()){
        return '누구세요?';
    }else{
        return '어서오세요' . auth()->user()->name;
    }

});

Route::get('auth/logout', function(){
     auth()->logout();
     return redirect('/');
});


// 쿼리문 디버깅
DB::listen( function($query){
    debug($query->sql);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
