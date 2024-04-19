<!-- ヘッダー -->
<header class="bg-dark mb-3 sticky-top">
    <div class="container">
        <nav class="navbar navbar-dark">
            <a class="navbar-brand mb-0 h1">Daily Budget Tool</a>

            <!-- PC_tab時のヘッダーメニュー -->
            @guest
                <!-- なし -->
            @else
                <div class="header-right pc_tab">
                    <button class="btn btn-success" ><a href="{{ route('index') }}">予算</a></button>
                    <button class="btn btn-success ml-1">予算登録</button>
                    <button class="btn btn-success ml-1">支出登録</button>
                    <div class="profile-picture profile-picture-header ml-1">
                        <!-- img-fluid：画像を中心にやってくれる(Bootstrap) -->
                        <img class="img-fluid cursor_pointer" src="/assets/sample.jpg" alt="Profile Picture">
                    </div>
                </div>
            @endguest


            <!-- sp時のハンバーガーメニュー -->
            @guest
                <!-- なし -->
            @else
                <!-- ハンバーガー -->
                <button class="navbar-toggler sp" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- メニュー -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <div class="d-flex ml-auto mt-2">
                            <li class="nav-item dropdown">
                                <button class="btn btn-success">予算</button>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn btn-success ml-1">予算登録</button>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn btn-success ml-1">支出登録</button>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="profile-picture profile-picture-header ml-1">
                                    <img class="img-fluid cursor_pointer" src="/assets/sample.jpg" alt="Profile Picture">
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            @endguest
            
        </nav>
    </div>
</header>
<!-- ヘッダー -->