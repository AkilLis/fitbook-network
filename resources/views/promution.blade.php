@extends('layouts.promution-layout')
@section('content')
  
  <div class="container main-page" 
       style="background-color:#fff; border-radius:4px; margin-top:10px; padding:20px;">
    <h1 style="text-align:center; font-size:30px;">Урамшууллын хөтөлбөр</h1>
    <br />
    <form>

      <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-2 col-md-2">
          <a ng-click="selectChanged()" style="float:left;" class="btn btn-success">Нэмэх</a>  
        </div>
        <div class="col-md-10 col-md-10">
          <input type="search" 
                 name="search" 
                 class="form-control" 
                 style="float:right;" 
                 ng-model="search"
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
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>
              <a>10</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Mary</td>
            <td>Moe</td>
            <td>20</td>
          </tr>
          <tr>
            <td>3999</td>
            <td>July</td>
            <td>Dooley</td>
            <td>30</td>
          </tr>
        </tbody>
      </table>
      <p class="bg-primary" style="padding: 15px; border-radius:4px;">Хамгийн эхний 10 хүн</p>
      <p class="bg-success" style="padding: 15px; border-radius:4px;">Хамгийн эхний 10 хүн</p>
      <p class="bg-info" style="padding: 15px; border-radius:4px;">Хамгийн эхний 10 хүн</p>
    </form>
  </div>
@stop