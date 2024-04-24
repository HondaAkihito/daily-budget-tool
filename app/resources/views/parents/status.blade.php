@if(session()->has('status'))
    <div class="text-center">{{session('status')}}が完了しました！</div>
@endif