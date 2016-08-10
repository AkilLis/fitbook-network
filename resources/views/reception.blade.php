@extends('layouts.reception')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 60px;">
              <div class="x_panel">
                <div class="row x_title">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h3>Хэрэглэгчийн жагсаалт</h3>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="row text-center">
                      <a ng-click="calcUsageAccount()" id="btn-add" class="btn btn-green"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                      <form method="GET" action = "{{url('admin/users')}}">
                        <input type="search" name="search" value="{{ old('search') }}" class="input-search" placeholder="Хэрэглэгчийн код, Хэрэглэгчийн нэр ..."/>
                      </form>
                    </div>
                  </div>
                  <div class="x_content centered">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th align="center" width="40%">Хэрэглэгч ID нэр</th>
                          <th align="center" width="30%">Огноо</th>
                          <th align="center" width="30%">Дүн</th>
                        </tr>
                      </thead>
                      <tbody id="tasks-list" name="tasks-list">
                        @foreach ($usageTrans as $tran)
                        <tr>
                          <td>{{$tran->outUser->userId}} {{$tran->outUser->fName}} {{$tran->outUser->lName}}</td>
                          <td>
                          {{$tran->invDate}}</td>
                          <td align="center">
                            {{$tran->outAmt}}₮
                          </td>
                        </tr>
                        @endforeach
                      </tbody> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- /page content -->
  <meta name="_token" content="{!! csrf_token() !!}" />
@stop

    
   