<?php
use App\Http\Controllers\TopController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

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

  // 支出登録
  // create、storeは、引数でidを必要としないためUser->とSpending->idの一致を確認するモデルバインディングで弾かれてしまう
  // そのため「create」「store」のみ外側&先に処理する 
  // ルートモデルバインディングではexceptをしっかり記述
  Route::resource('/spending', 'SpendingController', ['only' => ['create', 'store']]);

  // ルートモデルバインディング
  Route::group(['middleware' => 'can:view,spending'], function() {
    // 支出登録、支出詳細、支出削除、支出編集
    Route::resource('/spending', 'SpendingController', ['except' => ['create', 'store']]);
  });

    // マイページ
    Route::resource('/profile', 'ProfileController');

  // 検索
  Route::resource('/search', 'SearchController');
});