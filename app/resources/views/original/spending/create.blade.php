@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">支出登録</h2>
    <form action="{{ route('spending.store') }}" method="post" class="mt-5 date_option">
        @csrf
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" id="date" name="date" class="date_border form-control">
        </div>
        <div class="form-group">
            <label for="amount">支出金額(11桁以内)</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="支出金額を入力">
        </div>
        <div class="form-group">
            <label for="title">タイトル(20文字以内)</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="予算のタイトルを入力">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">支出を登録</button>
        </div>
    </form>
</section>

@endsection