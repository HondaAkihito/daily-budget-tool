@extends('parents.layout')
@section('content')

  <div class="container">
    <h2 class="mt-5 text-center">新規登録</h2>
    <form class="mt-5" action="{{ route('register') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="メールアドレスを入力" autocomplete="email">
      </div>
      <div class="form-group">
        <label for="name">ユーザー名</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="名前を入力" autocomplete="name">
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="パスワードを入力">
      </div>
      <div class="form-group">
        <label for="password_confirmation">パスワード再確認</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="上と同じパスワードを入力">
      </div>
      <div>
        <button type="submit" class="btn btn-primary">新規登録する</button>
      </div>
      <small class="form-text text-muted text-right"><a href="{{ route('login') }}">※ログインへ戻る</a></small>
    </form>
  </div>

@endsection