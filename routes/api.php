<?php

use App\Http\Controllers\ProductController;
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

Route::post('product/add' ,[ProductController::class,'store']);
Route::get('products' ,[ProductController::class,'productLists']);
Route::get('product/{id}/show' ,[ProductController::class,'showProduct']);
Route::put('product/{id}/update' ,[ProductController::class,'update']);
Route::delete('product/{id}/delete' ,[ProductController::class,'deleteProduct']);