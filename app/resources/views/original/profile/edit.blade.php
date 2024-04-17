@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">プロフィール画像更新</h2>
    <div class="form-group mt-5">
        <label for="id">↓ファイルを選択してください↓</label><br>
        <input type="file" id="input" class="cursor_pointer">
        <div class="profile-picture profile-picture-border mt-3">
            <img id="sample" class="img-fluid">
        </div>
    </div>
    <button class="btn btn-danger">アップロード</button>
</section>

@endsection