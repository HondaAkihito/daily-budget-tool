<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Spending;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ----- 予算の1件取得 -----
        $budget = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->first();

        // ----- 残り日数取得 -----
        // ①ログインユーザーの予算テーブルのdateカラムを取得(登録期日を取得)
        $date = Auth::user()->budget()->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->value('date');
        // ②本日の日付を取得 = Carbon::today() 
        // ③(①-②)を実行 = diffInDaysで差分を取得 = 残り日数
        $diff_in_day = Carbon::today()->diffInDays(Carbon::parse($date));
        
        // ----- リターン -----
        return view('original.index', [
            'budget' => $budget,
            'diff_in_day' => $diff_in_day,
        ]);


        // 本命
        // return view('original.index');
        
        // 予算登録
        // return view('original.budget.create');
        // 支出登録
        // return view('original.spending.create');
        // 支出詳細
        // return view('original.spending.show');
        // 支出編集
        // return view('original.spending.edit');
        // プロフィール
        // return view('original.profile.index');
        // プロフィール画像編集
        // return view('original.profile.edit');
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
