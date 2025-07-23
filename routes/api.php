<?php

use App\Http\Controllers\Api\CatAppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\CityController;


Route::post('/login', [CatAppController::class, 'login']);
Route::get('/texts', [CatAppController::class, 'getTexts']);
Route::get('/settings', [CatAppController::class, 'getSettings']);
Route::post('/log', [CatAppController::class, 'logClick']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/content/{lang}', [ContentController::class, 'getContent']);
Route::get('/images', [CatAppController::class, 'getImages']);
Route::get('/cities/{lang}', [CityController::class, 'getCities']);

