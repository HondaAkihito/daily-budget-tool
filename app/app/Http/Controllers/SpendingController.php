<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Spending;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\CreateData;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('original.spending.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $spending = new Spending;
        
        // RequestからのPOST値は、
        // Requestインスタンス($request)->POSTのnameで取得
        $spending->amount = $request->amount;
        $spending->date = $request->date;
        $spending->title = $request->title;
        
        Auth::user()->spending()->save($spending);
        
        return redirect('/')->with('status', '支出の登録');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $spending = Auth::user()->spending()->find($id);

        // URLでユーザーが所持しないidを入力された時に表示
        if(is_null($spending)) {
            abort(404);
        }

        return view('original.spending.show', [
            'spending' => $spending,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $spending = Auth::user()->spending()->find($id);

        // URLでユーザーが所持しないidを入力された時に表示
        if(is_null($spending)) {
            abort(404);
        }

        return view('original.spending.edit', [
            'spending' => $spending,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, int $id)
    {
        $record = Auth::user()->spending()->find($id);

        $record->amount = $request->amount;
        $record->date = $request->date;
        $record->title = $request->title;
        
        Auth::user()->spending()->save($record);

        // with = フラッシュメッセージも
        return redirect()->route('spending.show', ['spending' =>  $id])->with('status', '支出の更新');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $record = Auth::user()->spending()->find($id);
        $record = Auth::user()->spending()->find($id);
        $record->delete();

        // フラッシュメッセージ
        return redirect('/')->with('status', '支出の削除');
    }
}
