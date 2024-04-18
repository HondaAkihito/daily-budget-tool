@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">支出詳細</h2>
    <form class="mt-5 date_option">
        <div class="form-group d-flex border-bottom">
            <label for="title" class="col-form-label w-25">タイトル</label>
            <input type="text" class="form-control-plaintext" id="title" value="aaa" disabled readonly>
        </div>
        <div class="form-group d-flex border-bottom">
            <label for="amount" class="col-form-label w-25">支出金額</label>
            <input type="number" class="form-control-plaintext" id="amount" value="12345" disabled readonly>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-success">編集</button>
            <button type="submit" class="btn btn-danger ml-5">削除</button>
        </div>
    </form>
</section>

@endsection