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
        <input type="text" class="form-control-plaintext" id="name" value="{{ $user['name'] }}" disabled readonly autocomplete="off">
    </div>
    <div class="form-group d-flex border-bottom">
        <label for="email" class="col-form-label w-50">メールアドレス</label>
        <input type="text" class="form-control-plaintext" id="email" value="{{ $user['email'] }}" disabled readonly autocomplete="off">
    </div>

    <!-- オールリセット -->
    <form class="inline-block">
        @csrf
        <button type="submit" class="btn btn-danger mt-4">予算/支出をリセット</button>
    </form>
    
    <!-- ログアウト -->
    @if(Auth::check())
        <form class="inline-block" id="logout-form" action="{{ route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark mt-4 ml-3">ログアウト</button>
        </form>
    @endif

</section>

@endsection