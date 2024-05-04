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
                    <a class="btn btn-success ml-1 d-flex align-items-center" href="{{ route('index') }}">予算</a>
                    @if(Auth::user()->budget()->doesntExist())
                        <a class="btn btn-success ml-1 d-flex align-items-center" href="{{ route('budget.create') }}">予算登録</a>
                    @endif
                    <a class="btn btn-success ml-1 d-flex align-items-center" href="{{ route('spending.create') }}">支出登録</a>
                    <div class="profile-picture profile-picture-header ml-1">
                        <a href="{{ route('profile.index') }}">
                            <!-- img-fluid：画像を中心にやってくれる(Bootstrap) -->
                            <!-- {{ $icon }} = 共通ヘッダーの画像 = ComposerServiceProvider -->
                            <img class="img-fluid cursor_pointer img_opacity" src="{{$icon}}" alt="Profile Picture">
                        </a>
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
                                <a class="btn btn-success" href="{{ route('index') }}">予算</a>
                            </li>
                            @if(Auth::user()->budget()->doesntExist())
                                <li class="nav-item dropdown">
                                    <a class="btn btn-success ml-1" href="{{ route('budget.create') }}">予算登録</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="btn btn-success ml-1" href="{{ route('spending.create') }}">支出登録</a>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="profile-picture profile-picture-header ml-1">
                                    <a href="{{ route('profile.index') }}">
                                        <img class="img-fluid cursor_pointer" src="{{$icon}}" alt="Profile Picture">
                                    </a>
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