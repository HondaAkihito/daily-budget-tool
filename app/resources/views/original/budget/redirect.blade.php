@extends('parents.layout')
@section('content')

<!-- メイン全体 -->
<div class="container">

    <!-- フラッシュメッセージ -->
    @include('parents.status')

    <!-- 予算表示 -->
    <div class="mt-5 text-center">
        「予算登録」が終わったら<br>
        「予算ボタン」「支出登録ボタン」が開放されます
    </div>
    <section class="navbar justify-content-center">
        <div class="mb-5 mt-2 text-center">
            <a href="{{ route('budget.create') }}" class="btn btn-success display budget-redirect-a">予算登録</a>
        </div>
    </section>
</div>

@endsection