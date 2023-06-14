<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testData', [Controllers\AbTestDataController::class, 'showData']);
Route::get('/login', [Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [Controllers\AuthController::class, 'isloggedin'])->name('haslogin');

Route::post('/login', [Controllers\AuthController::class, 'login']);

Route::get('/newsite',[Controllers\ArticlesController::class, 'vueArticles'])->name('newsite');
Route::get('/impressum',[Controllers\ArticlesController::class, 'impressum']);

Route::get('/articles', [Controllers\ArticlesController::class, 'outputArticles'])->name('outputArticles');
Route::post('/articles',[Controllers\ArticlesController::class, 'setArticles']);
Route::get('/newarticle', [Controllers\ArticlesController::class, 'insertNewArticle']);


