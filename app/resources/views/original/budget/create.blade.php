@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">予算登録</h2>
    <form action="{{ route('budget.store') }}" method="post" class="mt-5 date_option">
        @csrf
        <div class="form-group">
            <label for="title">タイトル(20文字以内)</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="予算のタイトルを入力">
            <!-- バリデーション個別表示 -->
            @error('title')
                <div class="text-danger"><span>{{ $message }}</span></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="amount">予算(11桁以内)</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="予算を入力">
            <!-- バリデーション個別表示 -->
            @error('amount')
                <div class="text-danger"><span>{{ $message }}</span></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date">期限</label>
            <input type="date" id="date" name="date" class="date_border form-control">
            <!-- バリデーション個別表示 -->
            @error('date')
                <div class="text-danger"><span>{{ $message }}</span></div>
            @enderror
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">予算を登録</button>
        </div>
    </form>
</section>

@endsection