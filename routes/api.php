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



//Type
Route::prefix('type')->group(function (){
    Route::get('/list-type',[TypeController::class,'index'])->name('type.all');
    Route::post('/type-create',[TypeController::class,'store'])->name('type.create');
    Route::get('/type-update',[TypeController::class,'update'])->name('type.update');
    Route::post('/type-delete',[ReviewController::class,'delete'])->name('type.delete');
    Route::get('/type-trashed',[TypeController::class,'trashed'])->name('type.trashed');
    Route::get('/type-restore',[TypeController::class,'restore'])->name('type.restore');
});

Route::middleware('admin')->group(function (){

});
