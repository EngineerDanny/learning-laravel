<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::get('/product', function (Request $request) {
    return Product::all();
});

Route::post('/product', function () {
    return Product::create(
        [
            'name' => 'fourth product',
            'url' => 'url4',
            'description' => 'This is very nice 4',
            'price' => 50.90,
        ]
    );
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
