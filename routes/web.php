<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DefaultController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [DefaultController::class, 'welcome'])->name('welcome');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DefaultController::class, 'dashboard'])->name('dashboard');
    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
});
