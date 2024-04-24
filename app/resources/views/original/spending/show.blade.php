@extends('parents.layout')
@section('content')

<section class="container">
    <h2 class="mt-5 text-center">支出詳細</h2>
    <!-- <form class="mt-5 date_option"> -->
        <div class="form-group d-flex border-bottom">
            <label for="title" class="col-form-label w-25">日付</label>
            <input type="date" class="form-control-plaintext" id="date" value="{{ $spending['date'] }}" disabled readonly>
        </div>
        <div class="form-group d-flex border-bottom">
            <label for="title" class="col-form-label w-25">タイトル</label>
            <input type="text" class="form-control-plaintext" id="title" value="{{ $spending['title'] }}" disabled readonly>
        </div>
        <div class="form-group d-flex border-bottom">
            <label for="amount" class="col-form-label w-25">支出金額</label>
            <!-- 小数点(number_format)のためにinputではなくdivタグ使用 -->
            <div class="form-control-plaintext">{{number_format($spending['amount'])}}円</div>
        </div>
    <!-- </form> -->
    <div class="mt-4 d-flex">
        <a href="{{ route('spending.edit', ['spending' => $spending['id']]) }}" class="btn btn-success">編集</a>
        <form action="{{ route('spending.destroy', ['spending' => $spending['id']]) }}" method="post">
            @csrf
            <!-- HTMLフォームはGET or POSTのみが許可されている。
            だから↓フォームのDELETEリクエストを使う場合は、擬似的に使う方法をとる↓。 -->
            @method('DELETE')
            <button type="submit" class="btn btn-danger ml-5" onclick="return confirm('支出内容を削除しても良いですか？');">削除</button>
        </form>
    </div>
</section>

@endsection