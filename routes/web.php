<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoredController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\ProductUrlController;
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

Route::resource('products', ProductController::class);
Route::resource('urls', UrlController::class);
Route::resource('stores', StoreController::class);
Route::resource('storedproducts', StoredController::class);

Route::get('/addproducttourl/{url,}', 'App\Http\Controllers\UrlController@addproduct');
Route::get('/addproduct/{url}', 'App\Http\Controllers\UrlController@addproduct');

Route::post('user',[ProductController::class,'Login']);
Route::view('login','login');

Route::get('/', function () {
    return view('welcome');
});

/**Route::get('events/{event}/remind/{user}', [
'as' => 'remindHelper', 'uses' => 'EventsController@remindHelper']); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false]);
