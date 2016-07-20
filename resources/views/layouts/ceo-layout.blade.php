<!doctype html>
<html ng-app="fitwork">
<head>
    @include('includes.ceo-modals')
    @include('includes.head')
</head>
<body class="nav-md" id="style-3">
    <div class="container body" ng-controller="ceoCtrl">

        @include('includes.flash')

        <div>
            @include('includes.header')
            @yield('content')
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>