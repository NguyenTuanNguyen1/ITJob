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
use App\Http\Controllers\CMS\ReportController;
use App\Http\Controllers\CMS\ReviewController;
use App\Http\Controllers\CMS\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//User
Route::prefix('user')->group(function () {
    Route::get('/user-login', [LoginController::class, 'index'])->name('user.login');
    Route::post('/user-login', [LoginController::class, 'handleLogin'])->name('handle.login');

    Route::get('/user-register', [RegisterController::class, 'index'])->name('user.register');
    Route::post('/user-register', [RegisterController::class, 'handleRegister'])->name('handle.register');

    Route::get('/forgot-password', [ForgotController::class, 'index'])->name('forgot.mail.index');
    Route::post('/send-mail-forgot-email', [ForgotController::class, 'sendMailForgot'])->name('send.forgot.mail');
    Route::get('/forgot-password/{email}', [ForgotController::class, 'forgotPassWord'])->name('forgot.password.index');
    Route::post('/forgot-password', [ForgotController::class, 'handleForgot'])->name('handle.forgot');

    Route::post('/update-password', [ResetController::class, 'updatePassword'])->name('password.update');

    Route::post('/applied-post', [UserController::class, 'applied'])->name('user.applied.post');
});

//Profile
Route::prefix('profile')->group(function () {
    Route::get('profile/{id}', [ProfileController::class, 'userCompany'])->name('profile.user');
    Route::get('/user-profile/{id}', [ProfileController::class, 'profile'])->name('profile.index');
    Route::post('/user-update', [ProfileController::class, 'handleUpdate'])->name('profile.update');
    Route::post('/user-update-basic', [ProfileController::class, 'handleUpdateBasic'])->name('profile.update.basic');
    Route::post('/user-update-information', [ProfileController::class, 'handleUpdateInfor'])->name('profile.update.information');
    Route::get('/company-profile', [ProfileController::class, 'profileCompany'])->name('company.profile');
});

//Post
Route::prefix('post')->group(function () {
    Route::get('/list-post', [PostController::class, 'all'])->name('post.all');
    Route::get('/post-detail/{id}', [PostController::class, 'show'])->name('post.detail');
    Route::post('/post-create', [PostController::class, 'store'])->name('post.create');
    Route::post('/post-update', [PostController::class, 'update'])->name('post.update');
    Route::post('/post-delete', [PostController::class, 'delete'])->name('post.delete');
    Route::get('/post-trashed', [PostController::class, 'trashed'])->name('post.trashed');
    Route::post('/post-restore', [PostController::class, 'restore'])->name('post.restore');
    Route::get('/post-outstanding', [PostController::class, 'outstanding'])->name('post.outstanding');
});

//Backend
Route::prefix('search')->group(function () {
    Route::post('/', [BackendController::class, 'searchFilter'])->name('search.layout.filter');
    Route::post('/filter', [BackendController::class, 'searchCompanyFilter'])->name('search.company.filter');
    Route::get('/', [BackendController::class, 'searchAjax'])->name('search.ajax');
    Route::get('/get-post-by-major', [BackendController::class, 'getPostByMajor'])->name('post.major');
    Route::get('/messenger/name', [BackendController::class, 'searchAjaxName'])->name('search.name');
});

//Contact
Route::prefix('contact')->group(function () {
    Route::get('', [ContactController::class, 'view'])->name('contact.index');
    Route::get('/contact-detail', [ContactController::class, 'show'])->name('contact.detail');
    Route::post('/contact-create', [ContactController::class, 'store'])->name('contact.create');
    Route::get('/contact-delete', [ContactController::class, 'delete'])->name('contact.delete');
    Route::get('/list-contact-replied', [ContactController::class, 'replied'])->name('contact.replied');
});

//Report
Route::prefix('report')->group(function () {
    Route::get('/list-report', [ReportController::class, 'index'])->name('report.all');
    Route::get('/report-detail', [ReportController::class, 'show'])->name('report.detail');
    Route::get('/image', [ReportController::class, 'image'])->name('report.image');
    Route::post('/report-create', [ReportController::class, 'store'])->name('report.create');
    Route::post('/report-user', [ReportController::class, 'user'])->name('report.user');
    Route::get('/report-delete', [ReportController::class, 'delete'])->name('report.delete');
    Route::get('/report-reply', [ReportController::class, 'reply'])->name('report.reply');
    Route::get('/list-report-replied', [ReportController::class, 'replied'])->name('report.replied');
});

//Review
Route::prefix('review')->group(function () {
    Route::get('/list-review', [ReviewController::class, 'index'])->name('review.view');
    Route::post('/review-create', [ReviewController::class, 'store'])->name('review.create');
    Route::post('/review-update', [ReviewController::class, 'update'])->name('review.update');
    Route::post('/review-delete', [ReviewController::class, 'delete'])->name('review.delete');
});

//Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'authorize'], function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/register-admin', [DashboardController::class, 'register'])->name('dashboard.register.view');
    Route::get('/admin/admin-profile/{id}', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::get('/admin/user-profile/{id}', [DashboardController::class, 'profileUser'])->name('dashboard.profile.user');
    Route::get('/account', [DashboardController::class, 'account'])->name('dashboard.account');
    Route::get('/contact', [DashboardController::class, 'contact'])->name('dashboard.contact');
    Route::get('/report', [DashboardController::class, 'report'])->name('dashboard.report');
    Route::get('/history', [DashboardController::class, 'history'])->name('dashboard.history');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'authorize'], function () {
    Route::post('/approved_post', [AdminController::class, 'approved'])->name('admin.approved.post');
    Route::post('/delete-user', [AdminController::class, 'deleteUserByAdmin'])->name('admin.delete.user');
    Route::post('/restore-user', [AdminController::class, 'restoreUserByAdmin'])->name('admin.restore.user');
    Route::post('/replied-contact', [AdminController::class, 'repliedContact'])->name('admin.replied.contact');
    Route::post('/replied-report', [AdminController::class, 'repliedReport'])->name('admin.replied.report');
    Route::post('/replied-report-user', [AdminController::class, 'repliedReportUser'])->name('admin.replied.report.user');
});

//Company
Route::group(['prefix' => 'company'], function () {
    Route::get('/index', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/candidate', [CompanyController::class, 'candidate'])->name('company.candidate');
    Route::get('/review', [CompanyController::class, 'review'])->name('company.review');
    Route::get('/replied', [CompanyController::class, 'review'])->name('company.replied');
    Route::get('/post-create', [CompanyController::class, 'post'])->name('company.post.create');
    Route::post('/update-profile', [CompanyController::class, 'update'])->name('company.update');
});

//Social
Route::group(['prefix' => 'admin', 'middleware' => 'authorize'], function () {
    Route::get('/login-google/{provider}', [OAuthController::class, 'redirect_Google'])->name('login.google');
    Route::get('/callback/{provider}', [OAuthController::class, 'callback_Google'])->name('callback.google');

    Route::get('/login-linkedin/{provider}', [OAuthController::class, 'redirect_Linkedin'])->name('login.linkedin');
    Route::get('/callback/{provider}', [OAuthController::class, 'callback_Linkedin'])->name('callback.linkedin');
});

//Email
Route::group(['prefix' => 'email'], function () {
    Route::get('/email-delete-post', [BackendController::class, 'deletePostMail'])->name('mail.delete.post');
    Route::get('/email-restore-post', [BackendController::class, 'restorePostMail'])->name('mail.restore.post');
    Route::get('/email-delete-user', [BackendController::class, 'deleteUserMail'])->name('mail.delete.user');
    Route::get('/email-restore-user', [BackendController::class, 'restoreUserMail'])->name('mail.restore.user');

});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/error', [HomeController::class, 'notFound'])->name('not.found');


//Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('123', [HomeController::class, 'mail'])->name('test-mail');
