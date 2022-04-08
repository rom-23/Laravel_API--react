<?php

use App\Http\Middleware\React;
use Illuminate\Support\Facades\Route;

Route::post('/picture/store', 'App\Http\Controllers\PictureController@store')->middleware(React::class);
Route::post('/register', 'App\Http\Controllers\AuthenticationController@register');
Route::post('/login', 'App\Http\Controllers\AuthenticationController@login');
Route::post('/picture', 'App\Http\Controllers\PictureController@search');
Route::get('/picture/{id}', 'App\Http\Controllers\PictureController@show')->middleware(React::class);
Route::get('/picture/{id}/checkLike', 'App\Http\Controllers\PictureController@checkLike')->middleware(React::class);
Route::get('/picture/{id}/handleLike', 'App\Http\Controllers\PictureController@handleLike')->middleware(React::class);

