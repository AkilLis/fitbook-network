<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('includes.header')
        
        @yield('content')

        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
    @include('includes.modals')
</div>
</body>
</html>