<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Spending;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\CreateFile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        return view('original.profile.index', [
            'user' => $user,
        ]);
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
    public function edit(int $id)
    {
        // 編集ページへ
        $user = Auth::user();

        return view('original.profile.edit', [
            'user' => $user,
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFile $request, $id)
    {
        // $file_name = request()->file('file')->getClientOriginalName(); でも可
        // getClientOriginalName = 拡張子を含め、アップロードしたファイルのファイル名を取得
        $file_name = $request->file('file')->getClientOriginalName();
        // $file_name = uniqid() . '_' . $file_name;
        $request->file('file')->storeAs('public', $file_name);
    
        $user = Auth::user();
        $user->update(['file_path' => '/storage/'.$file_name]);
    
        // route('profile.index')で$user = Auth::user();をやっているから、ここでデータを送らなくても取得してくれる
        return redirect()->route('profile.index')->with('status', 'プロフィール画像の更新');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::user()->budget()->delete();
        Auth::user()->spending()->delete();
        return redirect('/')->with('status', '予算/支出のリセット');
    }
}
