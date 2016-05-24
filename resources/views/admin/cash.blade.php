@extends('layouts.master')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 60px;">
              <div class="x_panel">
                <div class="row x_title">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h3>Гүйлгээ хийсэн хэрэглэгчийн жагсаалт</h3>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                    <div class="row text-center plus-button">
                      <a href="" id="btn-add" class="btn btn-green" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i> Мөнгө цэнэглэх</a>
                    </div>
                    <div class="row text-center plus-button">
                      <a href="" id="btn-add" class="btn btn-green" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i> Цалин олгох</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                      <form>
                        <input type="search" name="search" class="input-search" placeholder="Хэрэглэгчийн код, Хэрэглэгчийн нэр ..."/>
                      </form>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                      <form>
                        <select class="filter-combo">
                          <option value="All">Бүх</option>
                          <option value="Inactive">Цалин олгосон</option>
                          <option value="Reg">Цэнэглэсэн</option>
                        </select>           
                      </form>
                    </div>
                  </div>
                  <div class="x_content centered">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th align="center" width="15%">Огноо</th>
                          <th align="center" width="40%">Хэрэглэгч ID нэр</th>
                          <th align="center" width="30%">Гүйлгээний төрөл</th>
                          <th align="center" width="15%">Цэнэглэсэн мөнгөн дүн</th>
                        </tr>
                      </thead>  
                      <tbody id="tasks-list" name="tasks-list">
                        <tr>
                          <td><span>2016/03/15</span><span>15:30:28</span></td>
                          <td>ID, Овог, Нэр</td>
                          <td>Олгосон</td>
                          <td align="center">
                            10000000₮
                          </td>
                        </tr>
                      </tbody> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- /page content -->
@stop

    
   