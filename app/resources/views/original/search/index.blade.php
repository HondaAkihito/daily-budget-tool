@extends('parents.layout')
@section('content')

<!-- メイン全体 -->
<div class="container">

    <!-- 予算表示 -->
    <h2 class="mt-5 text-center">
        @if(Auth::user()->budget()->exists())
            {{ $budget['title'] }} ({{ $budget['date'] }}まで)
        @else 予算の表示 
        @endif
    </h2>
    <section class="navbar">
        <table class="table border shadow">
            <thead>
                <tr class="card-header card-header-bg">
                    <th scope="col" class="text-center w-25">予算</th>
                    <th scope="col" class="text-center w-25">残り予算</th>
                    <th scope="col" class="text-center w-25">残り日数</th>
                    <th scope="col" class="text-center w-25">1日の予算</th>
                </tr>
            </thead>
            @if(Auth::user()->budget()->exists())
                <tbody>
                    <tr class="card-body bg-white">
                        <td class="text-center w-25">{{ number_format($budget['amount']) }}円</td>
                        <td class="text-center w-25">{{ number_format($budget['rest_amount']) }}円</td>
                        <td class="text-center w-25">{{ $budget['rest_day'] }}日</td>
                        <td class="text-center w-25">{{ number_format($budget['day_amount']) }}円</td>
                    </tr>
                </tbody>
            @endif
        </table>
    </section>

    <!-- 検索 -->

    <h2 class="mt-5 text-center">
        @if(Auth::user()->budget()->exists())
            {{ $budget['title'] }}の支出
        @else 支出一覧の表示
        @endif
    </h2>
    <section class="navbar justify-content-around">
        <form class="date_option" action="{{ route('search.index') }}" method="GET">
            @csrf
            <input type="date" name="from" placeholder="from_date" class="cursor date_border" @if(isset($from)) value="{{$from}}" @endif>
                <span class="mx-1 text-grey">~</span>
            <input type="date" name="until" placeholder="until_date" class="cursor date_border" @if(isset($until)) value="{{$until}}" @endif>
            <button type="submit" class="btn btn-primary ml-3 search-btn">検索</button>
        </form>
    </section>

    <!-- 一覧表示 -->
    <section class="navbar mt-2">
        <table class="table border">
            <thead>
                <tr class="card-header">
                    <th scope="col" class="text-center align-middle w-25">日付</th>
                    <th scope="col" class="text-center align-middle w-25">タイトル</th>
                    <th scope="col" class="text-center align-middle w-25">支出</th>
                    <th scope="col" class="text-center align-middle w-25"></th>
                </tr>
            </thead>
            @if(Auth::user()->budget()->exists())
                <tbody id="gallery">
                @foreach ($spendings as $spending)
                    <tr class="card-body bg-white gallery">
                        <td class="text-center align-middle w-25">{{ $spending['date'] }}</td>
                        <td class="text-center align-middle w-25">{{ $spending['title'] }}</td>
                        <td class="text-center align-middle w-25">{{ number_format($spending['amount']) }}円</td>
                        <td class="text-center align-middle w-25">
                            <a href="{{ route('spending.show', ['spending' => $spending['id']]) }}" class="btn btn-info text-white btn-responsive">詳細</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
    </section>
</div>

@endsection