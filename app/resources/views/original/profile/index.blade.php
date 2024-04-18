@extends('parents.layout')
@section('content')

<section class="container">

    <h2 class="mt-5 text-center">プロフィール</h2>
    <div class="profile-picture mt-5 mx-auto">
        <img class="img-fluid cursor_pointer" src="/assets/sample.jpg" alt="Profile Picture">
    </div>
    <div class="mb-5 mt-2 text-center">
        <button type="submit" class="btn btn-success">編集</button>
    </div>

    <div class="form-group d-flex border-bottom">
        <label for="name" class="col-form-label w-50">名前</label>
        <input type="text" class="form-control-plaintext" id="name" value="名前です" disabled readonly>
    </div>
    <div class="form-group d-flex border-bottom">
        <label for="email" class="col-form-label w-50">メールアドレス</label>
        <input type="text" class="form-control-plaintext" id="email" value="a@a.a" disabled readonly>
    </div>

    <!-- オールリセット --><!-- ログアウト -->
    <form>
        @csrf
        <button type="submit" class="btn btn-danger mt-4">予算/支出をリセット</button>
        <button class="btn btn-dark mt-4 ml-3">ログアウト</button>
    </form>

</section>

@endsection