<!doctype html>
<html ng-app="fitwork">
<head>
    @include('includes.head')
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap3-typeahead.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular-route.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ui-bootstrap-tpls-1.3.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/controller/promcontroller.js')}}"></script>
    <script type="text/ng-template" id="AddPromutionUser.html">
      <div class="modal-content">
        <div class="modal-header" style="text-align:center;">
          <button type="button" ng-click="cancel()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Илсүүлсэн хүмүүс</h3>
        </div>
        <div class="modal-body">
          <form name="myForm" id="myForm" class="reg-modal form-group">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="text-align: left;">Овог</th>
                    <th style="text-align: left;">Нэр</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="child in childsList">
                    <td>@{{child.fName}}</td>
                    <td>@{{child.lName}}</td>
                  </tr>
                </tbody>
              </table>
          </form>
        </div>
      </div>
    </script>
</head>
<body class="nav-md" id="style-3">
<div class="container body">
    <div class="main_container">
        @yield('content')
    </div>
    {{-- <footer class="row">
        @include('includes.footer')
    </footer> --}}
</div>
</body>
</html>