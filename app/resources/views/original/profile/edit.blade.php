@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">プロフィール画像更新</h2>
    <div class="form-group mt-5">
        <form action="{{ route('profile.update', ['profile' => $user['id']]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <label for="file">↓ファイルを選択してください↓</label><br>
            <input type="file" id="input" name="file" class="cursor_pointer">
            <!-- バリデーション個別表示 -->
            @error('file')
                <div class="text-danger"><span>{{ $message }}</span></div>
            @enderror
            <div class="profile-picture profile-picture-border mt-3">
                <img id="sample" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-danger mt-3">アップロード</button>
        </form>
    </div>
</section>

@endsection