<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','dashboardController@index');
Route::get('/report','reportController@index');
Route::group(['prefix' => 'config'], function () {
	Route::get('/type','typeController@index');
    Route::get('/type_add','typeController@store')->name('config.type_add');
	Route::get('/medical','medicalController@index');
    Route::get('/medical_add','medicalController@store')->name('config.medical_add');
	Route::get('/company','companyController@index');
    Route::get('/company_add','companyController@store')->name('config.company_add');
    Route::get('/purchase','purchaseController@index');
    Route::get('/purchase_add','purchaseController@store')->name('config.purchase_add');
    Route::get('/budget','budgetController@index');
    Route::get('/budget_add','budgetController@store')->name('config.budget_add');
    Route::get('/department','departmentController@index');
    Route::get('/department_add','departmentController@store')->name('config.department_add');
});

Route::group(['prefix' => 'store'], function () {
	Route::get('/','storeController@index');
	Route::get('/receive','storeController@receive');
	Route::get('/withdraw','storeController@withdraw');
	Route::get('/order','storeController@order');
    Route::get('/add','storeController@add')->name('store.add');
    Route::get('/take','storeController@take')->name('store.take');
	Route::get('/{id}','storeController@show')->name('store.show');
	Route::get('/confirm/{id}','storeController@confirm')->name('store.confirm');
	Route::get('/order/{id}','storeController@order_show')->name('store.order_show');
    Route::post('/getMed','storeController@getMedical')->name('store.getMed');
});
