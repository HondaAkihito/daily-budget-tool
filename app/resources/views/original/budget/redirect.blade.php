@extends('parents.layout')
@section('content')

<!-- メイン全体 -->
<div class="container">

    <!-- フラッシュメッセージ -->
    @include('parents.status')

    <!-- 予算表示 -->
    <h2 class="mt-5 text-center">
        予算登録が終わったら<br>
        「予算 / 支出登録」が開放されます
    </h2>
    <section class="navbar">
        <div class="mb-5 mt-2 text-center w-100">
            <a href="{{ route('budget.create') }}" class="btn btn-success display">予算登録</a>
        </div>
    </section>
</div>

@endsection