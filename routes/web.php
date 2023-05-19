<?php

use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CMS\ContactController;
use App\Http\Controllers\CMS\PostController;
use App\Http\Controllers\CMS\ProfileController;
use App\Http\Controllers\CMS\ReportController;
use App\Http\Controllers\CMS\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CMS\TypeController;
use Illuminate\Support\Facades\Route;


//User
Route::prefix('user')->group(function () {
    Route::get('/user-login',[LoginController::class,'index'])->name('user.login');
    Route::post('/user-login',[LoginController::class,'handleLogin'])->name('handle.login');

    Route::get('/user-register',[RegisterController::class,'index'])->name('user.register');
    Route::post('/user-register',[RegisterController::class,'handleRegister'])->name('handle.register');

    Route::get('/send-mail-forgot-email',[ForgotController::class,'sendMailForgot'])->name('send.forgot.mail');
    Route::post('/forgot-password',[ForgotController::class,'handleForgot'])->name('handle.forgot');

    Route::get('/user-reset-password',[ResetController::class,'index'])->name('password.view');
    Route::post('/update-password',[ResetController::class,'updatePassword'])->name('password.update');

    Route::get('/user-profile/{id}',[ProfileController::class,'profile'])->name('user.profile');
    Route::post('/user-update',[ProfileController::class,'handleUpdate'])->name('handle.update');
});


//Post
Route::prefix('post')->group(function () {
    Route::get('/list-post',[PostController::class,'index'])->name('post.all');
    Route::get('/post-detail/{id}',[PostController::class,'show'])->name('post.detail');
    Route::post('/post-create',[PostController::class,'store'])->name('post.create');
    Route::post('/post-update',[PostController::class,'update'])->name('post.update');
    Route::get('/post-delete',[PostController::class,'delete'])->name('post.delete');
    Route::get('/post-trashed',[PostController::class,'trashed'])->name('post.trashed');
    Route::post('/post-restore',[PostController::class,'restore'])->name('post.restore');
});


Route::get('/login-google/{provider}',[HomeController::class,'redirect_Google'])->name('LoginGoogle');
Route::get('/callback/{provider}',[HomeController::class,'callback_Google'])->name('Callback');

Route::get('/chinh-sach-quyen-rieng-tu', function(){
    return '<h1> Chính sách quyền riêng tư </h1>';
});
Route::get('/login-facebook/{provider}',[HomeController::class,'redirect_Facebook'])->name('LoginFacebook');
Route::get('/callback-facebook/{provider}',[HomeController::class,'callback_Facebook'])->name('CallbackFacebook');


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('123demo',[HomeController::class,'test']);
Route::get('123',[HomeController::class,'mail'])->name('test-mail');
