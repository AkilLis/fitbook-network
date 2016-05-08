<!doctype html>
<html ng-app="fitwork">
<head>
    @include('includes.head')
    @include('includes.modals')
</head>
<body class="nav-md">
<div class="container body" ng-controller="mainCtrl">

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