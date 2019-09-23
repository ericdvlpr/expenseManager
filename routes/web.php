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

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', function () {
//     return 'hi admin';
// });
Route::resource('user','UserController')->middleware(['auth', 'auth.admin']);
Route::post('user/update', 'UserController@update')->name('user.update');
Route::get('user/destroy/{id}', 'UserController@destroy');

Route::resource('role', 'RoleController')->middleware('auth');

Route::post('role/update', 'RoleController@update')->name('role.update');
Route::get('role/destroy/{id}', 'RoleController@destroy');


Route::resource('expense', 'ExpenseController')->middleware('auth');
Route::post('expense/update', 'ExpenseController@update')->name('expense.update');
Route::get('expense/destroy/{id}', 'ExpenseController@destroy');

Route::resource('expense_category', 'ExpenseCategoryController')->middleware('auth');
Route::post('expense_category/update', 'ExpenseCategoryController@update')->name('expense_category.update');
Route::get('expense_category/destroy/{id}', 'ExpenseCategoryController@destroy');

