<?php

use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CMS\ChatController;
use App\Http\Controllers\CMS\ContactController;
use App\Http\Controllers\CMS\OAuthController;
use App\Http\Controllers\CMS\PostController;
use App\Http\Controllers\CMS\ProfileController;
use App\Http\Controllers\CMS\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//User
Route::prefix('user')->group(function () {
    Route::get('/user-login',[LoginController::class,'index'])->name('user.login');
    Route::post('/user-login',[LoginController::class,'handleLogin'])->name('handle.login');

    Route::get('/user-register',[RegisterController::class,'index'])->name('user.register');
    Route::post('/user-register',[RegisterController::class,'handleRegister'])->name('handle.register');

    Route::get('/send-mail-forgot-email',[ForgotController::class,'sendMailForgot'])->name('send.forgot.mail');
    Route::post('/forgot-password',[ForgotController::class,'handleForgot'])->name('handle.forgot');

    Route::post('/update-password',[ResetController::class,'updatePassword'])->name('password.update');

    Route::post('/applied-post',[UserController::class,'applied'])->name('user.applied.post');
});

//Profile
Route::prefix('profile')->group(function () {
    Route::get('profile/{id}', [ProfileController::class,'userCompany'])->name('profile.user');
    Route::get('/user-profile/{id}',[ProfileController::class,'profile'])->name('profile.index');
    Route::post('/user-update',[ProfileController::class,'handleUpdate'])->name('profile.update');
    Route::post('/user-update-basic',[ProfileController::class,'handleUpdateBasic'])->name('profile.update.basic');
    Route::post('/user-update-information',[ProfileController::class,'handleUpdateInfor'])->name('profile.update.information');
    Route::post('/user-delete-information',[ProfileController::class,'handleDeleteInfor'])->name('profile.delete.information');
});

//Post
Route::prefix('post')->group(function () {
    Route::get('/list-post',[PostController::class,'all'])->name('post.all');
    Route::get('/post-detail/{id}',[PostController::class,'show'])->name('post.detail');
    Route::post('/post-create',[PostController::class,'store'])->name('post.create');
    Route::post('/post-update',[PostController::class,'update'])->name('post.update');
    Route::get('/post-delete',[PostController::class,'delete'])->name('post.delete');
    Route::get('/post-trashed',[PostController::class,'trashed'])->name('post.trashed');
    Route::post('/post-restore',[PostController::class,'restore'])->name('post.restore');
    Route::get('/post-outstanding',[PostController::class,'outstanding'])->name('post.outstanding');
});

//Backend
Route::prefix('search')->group(function () {
    Route::post('/',[BackendController::class,'searchFilter'])->name('search.filter');
    Route::get('/',[BackendController::class,'searchAjax'])->name('search.ajax');
    Route::get('/get-post-by-major',[BackendController::class,'getPostByMajor'])->name('post.major');
    Route::get('/messenger/name',[BackendController::class,'searchAjaxName'])->name('search.name');
});

//Chat
Route::middleware('cors')->group(function (){
    Route::prefix('messenger')->group(function () {
        Route::get('/index',[ChatController::class,'index'])->name('index.message');
        Route::get('/{from_user_name}',[ChatController::class,'messenger'])->name('show.message');
        Route::post('/sent_message',[ChatController::class,'chat'])->name('sent.message');
    });
});

//Contact
Route::prefix('contact')->group(function () {
    Route::get('',[ContactController::class,'view'])->name('contact.index');
    Route::get('/contact-detail/{id}',[ContactController::class,'show'])->name('contact.detail');
    Route::post('/contact-create',[ContactController::class,'store'])->name('contact.create');
    Route::get('/contact-delete',[ContactController::class,'delete'])->name('contact.delete');
    Route::get('/contact-reply',[ContactController::class,'reply'])->name('contact.reply');
    Route::get('/list-contact-replied',[ContactController::class,'replied'])->name('contact.replied');
});

//Review
Route::prefix('review')->group(function (){
    Route::get('/list-review',[ReviewController::class,'index'])->name('review.view');
    Route::post('/review-create',[ReviewController::class,'store'])->name('review.create');
    Route::post('/review-update',[ReviewController::class,'update'])->name('review.update');
    Route::get('/review-detail/{id}',[ReviewController::class,'show'])->name('review.show');
    Route::get('/review-trashed',[ReviewController::class,'trashed'])->name('review.trashed');
    Route::post('/review-delete',[ReviewController::class,'delete'])->name('review.delete');
    Route::post('/review-restore',[ReviewController::class,'restore'])->name('review.restore');
});

//Dashboard
Route::prefix('dashboard')->group(function (){
    Route::get('/admin',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/admin/admin-profile/{id}',[DashboardController::class,'profile'])->name('dashboard.profile');
    Route::get('/account',[DashboardController::class,'account'])->name('dashboard.account');
    Route::get('/contact',[DashboardController::class,'contact'])->name('dashboard.contact');
    Route::get('/report',[DashboardController::class,'report'])->name('dashboard.report');
});

Route::prefix('admin')->group(function (){
    Route::post('/approved_post',[AdminController::class,'approved'])->name('admin.approved.post');
    Route::post('/delete-user',[AdminController::class,'deleteUserByAdmin'])->name('admin.delete.user');
    Route::post('/replied-contact',[AdminController::class,'repliedContact'])->name('admin.replied.contact');
});

Route::get('/login-google/{provider}',[OAuthController::class,'redirect_Google'])->name('login.google');
Route::get('/callback/{provider}',[OAuthController::class,'callback_Google'])->name('callback.google');

Route::get('/login-linkedin/{provider}',[OAuthController::class,'redirect_Linkedin'])->name('login.linkedin');
Route::get('/callback/{provider}',[OAuthController::class,'callback_Linkedin'])->name('callback.linkedin');

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/post-create',[HomeController::class,'post'])->name('post.index');


//
//Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/test',[HomeController::class,'test'])->name('test');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('123',[HomeController::class,'mail'])->name('test-mail');
