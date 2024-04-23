<?php
namespace App\Providers;
 
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Http\Request;
use App\Budget;
use App\Spending;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

 
class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
      // 共通ヘッダー画像
      View::composer('*', function($view) {
            // 中に書かないとエラー(「Trying to get property 'file_path' of non-object」)になる
            
            // ログイン状態か判別
            // これしないとログインページでエラー(「Trying to get property 'file_path' of non-object」)になる
            if(Auth::check()) {

              $user = Auth::user()->file_path;
              
              // 存在するか判別
              if( Auth::user()->file_path ) {
                $view->with('icon', $user);
              } else {
                // なかったら最初の画像を表示
                $view->with('icon', asset('/assets/sample-icon_daily-budget-tool.webp.webp'));
              }
            }

        });
    }
}