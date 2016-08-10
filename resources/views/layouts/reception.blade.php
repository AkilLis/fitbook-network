<!doctype html>
<html ng-app="fitwork">
<head>
    @include('includes.reception-modals')
    @include('includes.head')
</head>
<body class="nav-md" id="style-3">
<div class="container body" ng-controller="userCtrl">
    <div class="main_container">
        @include('includes.reception-header')
        @yield('content')
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>