@extends('layouts.master')
@section('content')
<!-- page content -->
        <div class="right_col" role="main" ng-controller="cashCtrl">
          <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 60px;">
              <div class="x_panel">
                <div class="row x_title">
                <form>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h3>Гүйлгээ хийсэн хэрэглэгчийн жагсаалт</h3>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="row text-center plus-button">
                      <a class="btn btn-green" ng-click="init('ceomoney')"><i class="fa fa-plus"></i> Мөнгө цэнэглэх</a>
                    </div>
                    <div class="row text-center plus-button">
                      <a class="btn btn-green" ng-click="init('giveSalary')"><i class="fa fa-plus"></i> Цалин олгох</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                        <input type="search" name="search" ng-model="search" class="input-search" placeholder="Хэрэглэгчийн код, Хэрэглэгчийн нэр ..."/>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <select class="filter-combo" ng-model="cashType" ng-change="selectChanged()">
                          <option value="All" selected>Бүх</option>
                          <option value="Award">Цалин олгосон</option>
                          <option value="CashLoad">Цэнэглэсэн</option>
                        </select>           
                    </div>
                  </div>
                  <div class="x_content centered">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th align="center" width="15%">Огноо</th>
                          <th align="center" width="40%">Хэрэглэгч ID нэр</th>
                          <th align="center" width="30%">Гүйлгээний төрөл</th>
                          <th align="center" width="15%">Мөнгөн дүн</th>
                        </tr>
                      </thead>  
                      <tbody id="tasks-list" name="tasks-list">
                        <tr ng-repeat="tran in transactions">
                          <td><span>@{{tran.invDate}}</span></td>
                          <td>@{{tran.userId}} @{{tran.fName}} @{{tran.lName}}</td>
                          <td>@{{tran.invType | customType}}</td>
                          <td align="center">
                            @{{tran.outAmt | number}}₮
                          </td>
                        </tr>
                      </tbody> 
                    </table>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- /page content -->
@stop

    
   