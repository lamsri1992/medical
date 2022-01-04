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
    Route::get('/edit','storeController@edit')->name('store.edit');
	Route::get('/{id}','storeController@show')->name('store.show');
	Route::get('/confirm/{id}','storeController@confirm')->name('store.confirm');
	Route::get('/cancel/{id}','storeController@cancel')->name('store.cancel');
	Route::get('/order/{id}','storeController@order_show')->name('store.order_show');
	Route::get('/report/{id}','reportController@report_order')->name('store.report_order');
    Route::post('/getMed','storeController@getMedical')->name('store.getMed');
});


Route::group(['prefix' => 'report'], function () {
	Route::get('/','reportController@index');
	Route::get('/stockcard','reportController@stockcard')->name('report.stockcard');
	Route::get('/summary','reportController@summary')->name('report.summary');
	Route::get('/history','reportController@history')->name('report.history');
	Route::get('/month','reportController@month')->name('report.month');
});

Route::group(['prefix' => 'user'], function () {
	Route::get('/','UserController@index');
	Route::get('/profile/{id}','UserController@profile')->name('user.profile');
	Route::get('/{id}','UserController@change')->name('user.change');
	Route::get('/user/pass/{id}','UserController@save_pass')->name('user.save_pass');
	Route::get('/user/edit/{id}','UserController@save_edit')->name('user.save_edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'dashboardController@logout');