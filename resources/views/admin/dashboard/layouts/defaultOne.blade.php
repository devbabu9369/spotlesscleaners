<!-- resources/views/layouts/default.blade.php -->
<html>
<head>
    <title>@yield('title')</title>
    @include('common.headerLink')
</head>
<body>
    <header>
        @include('common.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('common.footer')
    </footer>
</body>
</html>
@include('common.footerLink')
