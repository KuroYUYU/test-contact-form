<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/',[ContactController::class, 'form']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/send', [ContactController::class, 'send']);
Route::get('/thanks', [ContactController::class, 'thanks']);