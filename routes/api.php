<?php

use App\Http\Controllers\CMS\ContactController;
use App\Http\Controllers\CMS\ReportController;
use App\Http\Controllers\CMS\ReviewController;
use App\Http\Controllers\CMS\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

//Type
Route::prefix('type')->group(function (){
    Route::get('/list-type',[TypeController::class,'index'])->name('type.all');
    Route::post('/type-create',[TypeController::class,'store'])->name('type.create');
    Route::get('/type-update',[TypeController::class,'update'])->name('type.update');
    Route::post('/type-delete',[ReviewController::class,'delete'])->name('type.delete');
    Route::get('/type-trashed',[TypeController::class,'trashed'])->name('type.trashed');
    Route::get('/type-restore',[TypeController::class,'restore'])->name('type.trashed');
});

//Contact
Route::prefix('contact')->group(function () {
    Route::get('/list-contact',[ContactController::class,'index'])->name('contact.all');
    Route::get('/contact-detail/{id}',[ContactController::class,'show'])->name('contact.detail');
    Route::post('/contact-create',[ContactController::class,'store'])->name('contact.create');
    Route::get('/contact-delete',[ContactController::class,'delete'])->name('contact.delete');
    Route::get('/contact-reply',[ContactController::class,'reply'])->name('contact.reply');
    Route::get('/list-contact-replied',[ContactController::class,'replied'])->name('report.replied');
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
    Route::get('/list-report-replied',[ReportController::class,'replied'])->name('report.replied');
});

Route::middleware('admin')->group(function (){

});
