<!doctype html>
<!-- ユーザの言語環境によって文字変換されるコード -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
 
    <!-- レスポンシブ対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>日割り予算ツール</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    @include('parents.header')
    @yield('content')
</body>
</html>