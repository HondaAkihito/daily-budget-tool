@extends('admin.layout')
@section('admin_content')

<!-- メイン全体 -->
<div class="container">

    <!-- フラッシュメッセージ -->
    @include('admin.status')

    <!-- タイトル -->
    <h2 class="mt-5 text-center">ユーザー管理</h2>

    <!-- 検索 -->
    <section class="navbar justify-content-around">
        <form class="date_option" action="" method="get">
            @csrf
            <input type="name" name="name" placeholder="名前検索" class="cursor date_border">
                <span class="mx-1 text-grey">or</span>
            <input type="email" name="email" placeholder="メアド検索" class="cursor date_border">
            <button type="submit" class="btn btn-primary ml-3 search-btn">検索</button>
        </form>
    </section>

    <!-- 一覧表示 -->
    <section class="navbar mt-2">
        <table class="table border">
            <thead>
                <tr class="card-header">
                    <th scope="col" class="text-center align-middle w-25">名前</th>
                    <th scope="col" class="text-center align-middle w-25">メール</th>
                    <th scope="col" class="text-center align-middle w-25">最終ログイン</th>
                    <th scope="col" class="text-center align-middle w-25"></th>
                </tr>
            </thead>
                <tbody id="gallery">
                    <tr class="card-body bg-white gallery">
                        <td class="text-center align-middle w-25">aaa</td>
                        <td class="text-center align-middle w-25">a@a.a</td>
                        <td class="text-center align-middle w-25">2020:22:00</td>
                        <td class="text-center align-middle w-25">
                            <a href="" class="btn btn-danger text-white btn-responsive">削除</a>
                        </td>
                    </tr>
                </tbody>
        </table>
    </section>
</div>

@endsection