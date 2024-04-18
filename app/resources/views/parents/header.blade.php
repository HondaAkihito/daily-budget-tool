<!-- ヘッダー -->
<header class="bg-dark mb-3 sticky-top">
    <div class="container">
        <nav class="navbar navbar-dark">
            <span class="navbar-brand mb-0 h1">Daily Budget Tool</span>
            @if(Auth::check())
                <div class="header-right">
                    <button class="btn btn-success">予算</button>
                    <button class="btn btn-success ml-1">予算登録</button>
                    <button class="btn btn-success ml-1">支出登録</button>
                    <div class="profile-picture profile-picture-header ml-1">
                        <!-- img-fluid：画像を中心にやってくれる(Bootstrap) -->
                        <img class="img-fluid cursor_pointer" src="/assets/sample.jpg" alt="Profile Picture">
                    </div>
                </div>
            @endif
        </nav>
    </div>
</header>
<!-- ヘッダー -->