<!doctype html>
<html ng-app="fitwork">
<head>
    @include('includes.modals')
    @include('includes.head')
</head>
<body class="nav-md" id="style-3">
<div class="container body" ng-controller="mainCtrl">

	@include('includes.flash')

    <div class="main_container">
        @include('includes.header')
        @yield('content')
	</div>
    <footer class="row">
         @include('includes.footer')
    </footer>
</div>
</body>
</html>