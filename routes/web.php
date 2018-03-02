<?php

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

// Route::get('/about', function () {
//     echo 'about';
// });

Route::get('/', 'HomeController@index')->name('home');

// Routes with variables put lower!

// create route
Route::get('/products/create', 'ProductController@create')->name('products.create')->middleware('auth');
// store route
Route::post('/products', 'ProductController@store')->name('products.store')->middleware('auth');
// Product route
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
// edit route
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit')->middleware('auth');
// update route
Route::put('/products/{id}', 'ProductController@update')->name('products.update')->middleware('auth');
// delete route
Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy')->middleware('auth');


// CREATE 7 ROUTES

Route::resource('categories', 'CategoryController');






// Auth
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
