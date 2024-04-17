@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">支出編集</h2>
    <form class="mt-5 date_option">
        @csrf
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" id="date" class="date_border form-control" value="2022-08-03">
        </div>
        <div class="form-group">
            <label for="title">タイトル(20文字以内)</label>
            <input type="text" class="form-control" id="title" value="aaa">
        </div>
        <div class="form-group">
            <label for="amount">支出金額(11桁以内)</label>
            <input type="number" class="form-control" id="amount" value="12345">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</section>

@endsection