<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Spending;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\CreateData;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // ---------- 予算一覧表示 ----------
        // 空を用意することで「共通処理」で値がなくてもエラーにならない
        $budget = [];

        // 予算テーブルに値がある場合
        if(Auth::user()->budget()->exists()) {
            // ----- 残り日数取得 -----
            // ①ログインユーザーの予算テーブルのdateカラムを取得(登録期日を取得)
            $date = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->value('date');
            // ②本日の日付を取得 = Carbon::today() 
            // ③(①-②)を実行 = diffInDaysで差分を取得 = 残り日数
            $rest_day = Carbon::today()->diffInDays(Carbon::parse($date));
            // ④rest_dayを入れるログインユーザーの予算テーブルを取得
            $budget = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->first();
            // ⑤④で取得したテーブルに、③の$resultを入れる、そして更新
            $budget->rest_day = $rest_day;
            // ⑥更新
            Auth::user()->budget()->save($budget);
    
            // ----- 残り予算取得 -----
            // ①ログインユーザーの予算テーブルの一番古いamountカラムの値を取得
            $budget_amount = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->value('amount');
            // ②ログインユーザーの支出テーブamountカラムの合計値を取得
            $spending_amount = Auth::user()->spending()->sum('amount');
            // ③(② - ①)の計算を$resultへ
            $result = $budget_amount - $spending_amount;
            // ④$resultを入れるログインユーザーの予算テーブルを取得
            $budget = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->first();
            // ⑤④で取得したテーブルに、③の$resultを入れる
            $budget->rest_amount = $result;
            // ⑥更新
            Auth::user()->budget()->save($budget);
            
            // ----- 1日の予算 -----
            // ①ログインユーザーの予算テーブルのdateカラムの値を取得
            // 「残り日数取得」①で取得済み = $date
            // ②本日の日にちを取得 = Carbon::today() 
            // ③(①-②)を実行 = diffInDaysで差分を取得 = 残り日数
            // ④これだと0日の時に/0になってしまうため、最後に+1
            // 例）現在18日・期限22日の場合、差分は4日になるが、18.19.20.21.22で日割り計算したいために+1する
            $diff_in_day_plus1 = Carbon::today()->diffInDays(Carbon::parse($date)) + 1;
            // ⑤予算テーブルの「残り予算」カラムの値を取得
            $rest_amount = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->value('rest_amount');
            // ⑥(⑤/④)
            // 小数点切り捨て = floor()
            $result = floor($rest_amount / $diff_in_day_plus1);
            // ⑦更新先の予算テーブルを取得
            $budget = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->first();
            // ⑧代入 更新
            $budget->day_amount = $result;
            // ⑨更新
            Auth::user()->budget()->save($budget);
        }
            

        // ---------- 支出一覧表示 ----------
        // 空を用意することで「 共通処理①」で値がなくてもエラーにならない
        $spendings = [];
        
        // 支出テーブルに値がある場合
        if(Auth::user()->spending()->exists()) {
            $spendings = Auth::user()->spending()->orderBy('date', 'DESC')->get();
        }


        // ---------- 日付検索による支出一覧表示 ----------
        // 空で送信された時に、$fromと$untilは定義すらされていないのでエラーになってしまう。
        // そのため事前に空の文字列を定義しておく(配列だとエラーになる)
        $from = '';
        $until = '';
        
        //日付が選択されたら
        // from until 両方選択された場合
        if (!empty($request['from']) && !empty($request['until'])) {
            $from = $request['from'];
            $until = $request['until'];
            
            $spendings = Auth::user()->spending()->wherebetween('date', [$from, $until])->orderBy('date', 'DESC')->get();

            // from 選択された場合
        } elseif ($request['from']) {
            $from = $request['from'];
            $spendings = Auth::user()->spending()->where('date', '>=', $from )->orderBy('date', 'DESC')->get();
            
            // until 選択された場合
        } elseif ($request['until']) {
            $until = $request['until'];
            $spendings = Auth::user()->spending()->where('date', '<=', $until )->orderBy('date', 'DESC')->get();

            // from until 両方選択されなかった場合
        } else {
            $spendings = Auth::user()->spending()->orderBy('date', 'DESC')->get();
        }
        // 期間検索で参考にしたサイト：https://qiita.com/namizatork/items/9dd58f1731aa943c9add

        // ---------- 共通処理 ----------
        // ----- リターン -----
        return view('original.search.index', [
            // 日付
            "from" => $from,
            "until" => $until,

            // 「支出一覧表示」 or 「日付検索による支出一覧表示」の$spendings
            // 「支出一覧表示」 = 日付選択がない場合
            // 「日付検索による支出一覧表示」 = 日付選択がある場合
            'spendings' => $spendings,

            // 予算テーブルのレコード1件
            'budget' => $budget,
        ]);
        // ---------- 共通処理 ----------
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
