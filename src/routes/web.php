<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

//  ユーザー側ルート
Route::get('/',[ContactController::class, 'form']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/send', [ContactController::class, 'send']);
Route::get('/thanks', [ContactController::class, 'thanks']);
//  管理者側ルート ミドルウェア設定で未ログインは弾く
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/search', [AdminController::class, 'search']);
    Route::get('/admin/reset', [AdminController::class, 'reset']);
    Route::delete('/admin/delete', [AdminController::class, 'destroy']);
    Route::get('/admin/export', [AdminController::class, 'export']);
});