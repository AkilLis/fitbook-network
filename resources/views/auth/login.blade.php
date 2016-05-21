<!DOCTYPE html>
<html ng-app="demoBasic">
<head>
<title>FitBook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<div growl></div>
<div class="cont">
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }} " role = "alert">{{ Session::get('alert-' . $msg) }} 
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
  <div class="demo" ng-controller="basicDemoCtrl">
    <form class="login" method="POST" action="{{url('auth/login')}}">
      <div class="login__form">
        <div class="logo">
            <img height="90" src="images/logo.png"/>
        </div>
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" ng-model="email" name="email" class="login__input name" placeholder="Нэвтрэх нэр" required="Нэвтрэх нэр эсвэл и-мэйл хаягаа оруулна уу!"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" name="password" class="login__input pass" placeholder="Нууц үг"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
        <button type="submit" class="login__submit">НЭВТРЭХ</button>
        <p class="login__signup" ng-click="basicUsage('error')"><a>Нууц үг сэргээх</a></p>
      </div>
    </div>
  </form>
</div>
<script src="js/ligro.js"></script>
<script>
    $('div.flash-message').delay(2000).slideUp(300);
</script>
</body>
</html>