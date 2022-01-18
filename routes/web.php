<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/hello/{name}', function ($name) {
//    return "Hello, {$name}";
//});

Route::get('/about/', function ( ) {
    return "Информация о проекте";
});

Route::get('/contacts/', function () {
    return "Контактная информация";
});

// News Routes
//Route::get('/news', [NewsController::class, 'index']);
//Route::get('/news/{id}', [NewsController::class, 'show']);
//Используем нейминг для url адресов:

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+') // делаем исключения - если вместо id не число, то будет выдана 404 ошибка
    ->name('news.show');

// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});




