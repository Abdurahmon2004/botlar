<?php

use App\Http\Controllers\RandomUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/randomUser',[RandomUserController::class,'webhook']);


https://api.telegram.org/bot6674520210:AAEKhfAvfU0sPjjArYqaYYxW6vQCgbgWbV0/setWebhook?url=https://parvozairways.ru/api/randomUser
