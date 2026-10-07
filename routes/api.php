<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sante', fn () => ['ok' => true]);
Route::get('/hotel', fn ()=> json_decode(file_get_contents(database_path('data/hotel.json')), true));
Route::get('/categories', fn () => json_decode(file_get_contents(database_path('data/categories.json')), true));
