@extends('parents.layout')
@section('content')

  <div class="container">
    <h2 class="mt-5 text-center">ログイン</h2>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力" autocomplete="email">
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="パスワードを入力">
        <small id="emailHelp" class="form-text text-muted text-right"><a href="{{ route('password.request') }}">※パスワードを忘れた方はこちら</a></small>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">ログインする</button>
        <small id="emailHelp" class="form-text text-muted text-right"><a href="{{ route('register') }}">※会員登録はこちら</a></small>
      </div>
    </form>
  </div>

@endsection