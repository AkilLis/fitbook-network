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
              <a href="/promution/create" style="float:left;" class="btn btn-success">Нэмэх</a>  
            </div>
        @endif
      @endif

        <div class="col-md-10 col-md-10">
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
            <th style="text-align: left;">Урьсан</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $index => $user)
            <tr>
              <td>{{$index + 1}}</td>  
              <td>{{$user->fName}}</td>  
              <td>{{$user->lName}}</td>  
              <td>
                <a style="text-decoration:underline; font-weight:bold;" ng-click="childs({{$user->id}})">{{$user->childCount}}</a>
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