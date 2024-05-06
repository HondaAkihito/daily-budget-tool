<!-- ヘッダー -->
<header class="bg-dark mb-3 sticky-top">
    <div class="container">
        <nav class="navbar navbar-dark">
            <a class="navbar-brand mb-0 h1">Daily Budget Tool Manager</a>
            <div class="header-right pc_tab">
                <form method="post" action="{{ url('admin/logout') }}">
                    @csrf
                    <input class="btn btn-danger" type="submit" value="ログアウト" />
                </form>
            </div>
        </nav>
    </div>
</header>
<!-- ヘッダー -->