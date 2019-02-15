<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clients', 'ClientController@index');
Route::get('clients/{client}', 'ClientController@show');
Route::post('clients', 'ClientController@store');
Route::put('clients/{client}', 'ClientController@update');
Route::delete('clients/{client}', 'ClientController@delete');

Route::get('product', 'ProductController@index');
Route::get('products/{product}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::put('products/{product}', 'ProductController@update');
Route::delete('products/{product}', 'ProductController@delete');

Route::get('invoice', 'InvoiceController@index');
Route::get('invoices/{invoice}', 'InvoiceController@show');
Route::post('invoices', 'InvoiceController@store');
Route::put('invoices/{invoice}', 'InvoiceController@update');
Route::delete('invoices/{invoice}', 'InvoiceController@delete');