<!-- resources/views/layouts/default.blade.php -->
<html>

<head>
    <title>@yield('title')</title>
    @include('admin.dashboard.common.headerLink')
</head>

<body class="hold-transition sidebar-mini">

    @include('admin.dashboard.common.header')


    <div class="content-wrapper">

        @yield('content')
    </div>


    @include('admin.dashboard.common.footer')
    
 
    @if ($errors->any())
    
            @foreach ($errors->all() as $error)
              <script>      toastr.error("{{ $error }}"); </script>
            @endforeach
       
    @endif
    @if (session()->has('success'))
    
              <script>      toastr.success("{{ session()->get('success') }}"); </script>
       
       
    @endif
</body>

</html>
@include('admin.dashboard.common.footerLink')