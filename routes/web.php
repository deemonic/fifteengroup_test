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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contacts', 'ContactsController@index')->name('contacts');
    Route::get('contacts/create', 'ContactsController@create')->name('contacts.create');
    Route::post('contacts/create', 'ContactsController@store')->name('contacts.store');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');

    Route::get('contacts/{contact}/address/create', 'ContactAddressController@create')->name('address.create');
    Route::post('contacts/address/store', 'ContactAddressController@store')->name('address.store');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies.store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies.update');

    Route::get('orders', 'OrderController@index')->name('orders');
    Route::get('orders/create', 'OrderController@create')->name('orders.create');
    Route::post('orders/store', 'OrderController@store')->name('orders.store');

});

Route::get('/home', 'HomeController@index')->name('home');
