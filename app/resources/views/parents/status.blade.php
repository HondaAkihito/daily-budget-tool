@if(session()->has('status'))
    <div class="text-center border border-danger text-danger">{{session('status')}}が完了しました！</div>
@endif