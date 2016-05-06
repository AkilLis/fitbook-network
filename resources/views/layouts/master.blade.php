<!doctype html>
<html>
<head>
    @include('includes.head')
    @include('includes.modals')
</head>
<body class="nav-md" ng-app="">
<div class="container body">

	@include('includes.flash')

    <div class="main_container">

        @include('includes.header')
        
        @yield('content')

        <footer class="row">
            @include('includes.footer')
        </footer>
</div>
</body>
</html>