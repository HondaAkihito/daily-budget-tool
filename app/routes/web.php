<?php
use App\Http\Controllers\TopController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  // トップページ
  Route::resource('/', 'TopController');
  // 予算登録
  Route::resource('/budget', 'BudgetController');
  // 支出登録、支出詳細、支出削除、支出編集
  Route::resource('/spending', 'SpendingController');
});