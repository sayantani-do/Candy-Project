<?php

use App\Http\Controllers\Candy\CandyController;
use App\Http\Controllers\Cart\CartController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('candies', CandyController::class);
Route::apiResource('cart', CartController::class);
Route::get('cart/add-quantity/{cart}', [CartController::class, 'addQuantity'])->name('cart.add.quantity');
Route::get('cart/reduce-quantity/{cart}', [CartController::class, 'reduceQuantity'])->name('cart.reduce.quantity');



// Route::middleware('auth:api')->group(function(){
// });