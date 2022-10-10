<?php

use App\Http\Controllers\Api\AnimalController;
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
$urlDecode = urldecode('%3A');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/v1/breeds/{breed}',[AnimalController::class,'showBreedImageOnly']);
Route::get('/v1/breeds/',[AnimalController::class,'index']);
Route::get('/v1/{slug}image',function(){
    dd("wtf");
})->where('slug','([A-Za-z0-9\-\_\%\~\@\#$\^\&\*\(\)\+\.\>\<\:\;\"/]+)');


