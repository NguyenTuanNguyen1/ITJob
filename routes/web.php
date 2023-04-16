<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CMS\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index'])->name('home');

//User
Route::prefix('user')->group(function () {
    Route::get('/user_login',[HomeController::class,'login'])->name('user_Login');
    Route::post('/user_login',[LoginController::class,'handle_login'])->name('.handle-Login');

    Route::get('/user_register',[HomeController::class,'register'])->name('user_Register');
    Route::post('/user_register',[RegisterController::class,'handle_register'])->name('.handle-Register');
});

//Post
Route::prefix('post')->group(function () {
    Route::get('/post',[PostController::class,'index'])->name('post');
    Route::post('/create-post',[PostController::class,'store'])->name('.create-post');
});

Route::get('/login-google/{provider}',[HomeController::class,'redirect_Google'])->name('LoginGoogle');
Route::get('/callback/{provider}',[HomeController::class,'callback_Google'])->name('Callback');

Route::get('/chinh-sach-quyen-rieng-tu', function(){
    return '<h1> Chính sách quyền riêng tư </h1>';
});
Route::get('/login-facebook/{provider}',[HomeController::class,'redirect_Facebook'])->name('LoginFacebook');
Route::get('/callback-facebook/{provider}',[HomeController::class,'callback_Facebook'])->name('CallbackFacebook');

Route::get('123',[HomeController::class,'test']);
