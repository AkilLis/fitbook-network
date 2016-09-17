@extends('layouts.promution-layout')
@section('content')
  
  <div class="container main-page" ng-controller="promCtrl" 
       style="background-color:#fff; border-radius:4px; margin-top:10px; padding:20px;">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1 style="text-align:center; font-size:30px;">Урамшууллын хөтөлбөр</h1>
    <br />
    <form method="GET" action="/promution">
      <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">


      @if ( Auth::check() )
        @if ( Auth::user()->hasRole('Promutionmanager'))
            <div class="col-md-2 col-md-2">
              <a href="/promution/create" style="float:right;" class="btn btn-success">Нэмэх</a>  
            </div>
        @endif
      @endif

      @if ( Auth::check() )
        @if ( Auth::user()->hasRole('Promutionmanager'))
            <div class="col-md-2 col-md-2">
              <a href="/auth/logout" style="float:left; text-decoration:underline;" class="btn">Гарах</a>  
            </div>
        @endif
      @endif

        <div class="col-md-8 col-md-8">
          <input type="search" 
                 name="search" 
                 value="{{ old('search') }}"
                 class="form-control" 
                 style="float:right;" 
                 placeholder="хайх ...">
        </div>
      </div>
      <br />
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width:30px;">№</th>
            <th style="text-align: left;">Овог</th>
            <th style="text-align: left;">Нэр</th>
            <th style="text-align: left;">Регистр</th>
            <th style="text-align: left;">Урьсан</th>
            <th style="text-align: left;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $index => $user)
            <tr>
              <td>{{$index + 1}}</td>  
              <td>{{$user->fName}}</td>  
              <td>{{$user->lName}}</td>  
              <td>{{$user->registryNo}}</td>  
              <td>
                <a style="text-decoration:underline; font-weight:bold;" ng-click="childs({{$user->id}})">{{$user->childCount}}</a>
              </td>  
              <td>
                <form method="POST" action="/promution/{{$user->id}}">

                  {{ csrf_field() }}

                  <input name="_method" type="hidden" value="DELETE">
                  <button style="font-size:8px; float:right;" class="btn btn-danger btn-xs">x
                  </button>    
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div style="text-align:center">
        {{ $users->links() }}
      </div>
      <p class="bg-info" style="padding: 15px; border-radius:4px;">Хамгийн эхний 5 хүн</p>
      <p class="bg-success" style="padding: 15px; border-radius:4px;">Хамгийн эхний 10 хүн</p>
      <p class="bg-warning" style="padding: 15px; border-radius:4px;">Хамгийн эхний 20 хүн</p>
    </form>
  </div>
  <script type="text/javascript">
  </script>
@stop