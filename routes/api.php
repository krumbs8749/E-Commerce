<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', [Controllers\ArticlesAPIController::class, 'APIGetArticle']);
Route::post('/articles', [Controllers\ArticlesAPIController::class, 'APIPostArticle']);

Route::post('/shoppingcart', [Controllers\ShoppingCartAPIController::class, 'APIAddShoppingCartItem']);
Route::delete('/shoppingcart/{shoppingcartId}/articles/{articleId}', [Controllers\ShoppingCartAPIController::class, 'APIDeleteShoppingCartItem']);

Route::post('/articles/{id}/sold', [Controllers\ArticlesAPIController::class, 'APIArticleSold']);
Route::post('/articles/{id}/offer', [Controllers\ArticlesAPIController::class, 'APIArticleOffer']);
