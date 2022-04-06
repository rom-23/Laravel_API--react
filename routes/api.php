<?php

use App\Http\Middleware\PhotoMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/users', 'App\Http\Controllers\TestController@getMethod');
//
//Route::post('/users', 'App\Http\Controllers\TestController@postMethod');
//
//Route::post('/photo', 'App\Http\Controllers\PhotoController@store')->middleware(PhotoMiddleware::class);
Route::post('/register', 'App\Http\Controllers\AuthenticationController@register');
//
//Route::get('/env', function (){
//   return response()->json([
//       'connection'=>env('DB_CONNECTION')
//   ]);
//});
