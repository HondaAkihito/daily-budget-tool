@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">支出編集</h2>
    <form action="{{ route('spending.update', ['spending' => $spending['id']]) }}" method="post" class="mt-5 date_option">
    @csrf
    @method('PATCH')
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" id="date" name="date" value="{{ $spending['date'] }}" class="date_border form-control">
        </div>
        <div class="form-group">
            <label for="title">タイトル(20文字以内)</label>
            <input type="text" id="title" name="title" value="{{ $spending['title'] }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="amount">支出金額(11桁以内)</label>
            <input type="number" id="amount" name="amount" value="{{ $spending['amount'] }}" class="form-control">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</section>

@endsection