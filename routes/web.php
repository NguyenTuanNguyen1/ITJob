<?php

use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CMS\PostController;
use App\Http\Controllers\CMS\ProfileController;
use App\Http\Controllers\CMS\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TypeController;
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

    Route::post('/user-update',[ProfileController::class,'handleUpdate'])->name('handle.update');
});

//Review
Route::prefix('review')->group(function (){
    Route::get('/list-review',[ReviewController::class,'index'])->name('review.view');
    Route::post('/review-create',[ReviewController::class,'store'])->name('review.create');
    Route::post('/review-update',[ReviewController::class,'update'])->name('review.update');
    Route::get('/review-detail/{id}',[ReviewController::class,'show'])->name('review.show');
    Route::get('/review-trashed',[ReviewController::class,'trashed'])->name('review.trashed');
    Route::post('/review-delete',[ReviewController::class,'delete'])->name('review.delete');
    Route::post('/review-restore/{id}',[ReviewController::class,'restore'])->name('review.restore');
});

//Type
Route::prefix('type')->group(function (){
    Route::get('/list-type',[TypeController::class,'index'])->name('type.all');
    Route::get('/type-create',[TypeController::class,'store'])->name('type.create');
    Route::get('/type-update',[TypeController::class,'update'])->name('type.update');
    Route::post('/type-delete',[ReviewController::class,'delete'])->name('type.delete');
    Route::get('/type-trashed',[TypeController::class,'trashed'])->name('type.trashed');
    Route::get('/type-restore',[TypeController::class,'restore'])->name('type.trashed');
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

//Contact
Route::prefix('contact')->group(function () {
    Route::get('/list-contact',[ContactController::class,'index'])->name('contact.all');
    Route::get('/contact-detail/{id}',[ContactController::class,'show'])->name('contact.detail');
    Route::post('/contact-create',[ContactController::class,'store'])->name('contact.create');
    Route::get('/contact-delete',[ContactController::class,'delete'])->name('contact.delete');
    Route::get('/contact-reply',[ContactController::class,'reply'])->name('contact.reply');
    Route::post('/list-contact-replied',[ContactController::class,'replied'])->name('report.replied');
//    Route::post('/contact-restore',[ContactController::class,'restore'])->name('contact.restore');
});

//Report
Route::prefix('report')->group(function () {
    Route::get('/list-report',[ReportController::class,'index'])->name('report.all');
    Route::get('/report-detail/{id}',[ReportController::class,'show'])->name('report.detail');
    Route::post('/report-create',[ReportController::class,'store'])->name('report.create');
    Route::get('/report-delete',[ReportController::class,'delete'])->name('report.delete');
//    Route::get('/contact-trashed',[ReportController::class,'trashed'])->name('contact.trashed');
    Route::get('/report-reply',[ReportController::class,'reply'])->name('report.reply');
    Route::post('/list-report-replied',[ReportController::class,'replied'])->name('report.replied');
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
Route::get('123',[HomeController::class,'test']);
