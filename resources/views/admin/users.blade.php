@extends('layouts.master')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="row x_title">
            <div class="col-md-8">
            <h3>Хэрэглэгчийн жагсаалт</h3>
            </div>
            <div class="col-md-4">
            <div class="row text-center">
              <a href="#" class="btn btn-green" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus"></i> Нэмэх</a>
            </div>
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Хэрэглэгчийн бүртгэл</h4>
                </div>
                <div class="modal-body">
                <form class="reg-modal form-group" >
                 <div class="row">
                  <div class="col-md-4 vertical-centered-label">
                    <label>Хэрэглэгчийн код</label>
                  </div>
                  <div class="col-md-8">
                    <input name="userId" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>    
                  <div class="col-md-4 vertical-centered-label">
                    <label>Овог</label>
                  </div>
                  <div class="col-md-8">
                    <input name="nameL" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Нэр</label>
                  </div>
                  <div class="col-md-8">
                    <input name="nameF" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Регистрийн №</label>
                  </div>
                  <div class="col-md-8">
                    <input name="registryNo" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Дансны дугаар</label>
                  </div>
                  <div class="col-md-8">
                    <input name="accountId" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Гэрийн хаяг</label>
                  </div>
                  <div class="col-md-8">
                    <input name="address" class="input-default" type="textarea" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Цахим шуудан</label>
                  </div>
                  <div class="col-md-8">
                    <input name="email" class="input-default" type="email" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Утасны дугаар</label>
                  </div>
                  <div class="col-md-8">
                    <input name="phone" class="input-default" type="tel" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                 </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <form action = "users/search">
              <input type="search" class="input-search" placeholder="Хэрэглэгчийн код, Хэрэглэгчийн нэр ..."/>
              </form>
            </div>
            <div class="col-md-4">
              <form>
                <select class="filter-combo">
                  <option value="All">Бүх хэрэглэгчид</option>
                  <option value="Inactive">Идэвхигүй хэрэглэгчид</option>
                  <option value="Reg">Шивэгч харах</option>
                  <option value="Block">Блок жагсаалт</option>
                  <option value="Black">Хар жагсаалт</option>
                </select>           
              </form>
            </div>
          </div>
                  <div class="x_content centered">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th align="center" width="20%">Хэрэглэгч ID</th>
                          <th align="center" width="20%">Хэрэглэгчийн нэр</th>
                          <th align="center" width="20%">Дэлгэрэнгүй мэдээлэл</th>
                          <th align="center" width="10%">Төлөв</th>
                          <th align="center" width="10%">Шивэгч</th>
                          <th align="center" width="10%">Нууц үг солих</th>
                          <th align="center" width="10%">Тан код авах</th>
                        </tr>
                      </thead>

                      <tbody id="tasks-list" name="tasks-list">
                        @foreach ($users as $user)
                          <tr id="user{{$user->id}}">
                              <td>{{$user->id}}</td>
                              <td>{{$user->email}} {{$user->lName}}</td>
                              <td><a href="#">Дэлгэрэнгүй</a></td>
                              <td align="center"><img class="imgCheck" src="{{asset('images/check.png')}}" style="height:16px" ></td>
                              <td align="center"><img src="{{asset('images/check.png')}}" style="height:16px" ></td>
                              <td><a href="#">Нууц үг авах</a></td>
                              <td><a href="#">Тан авах</a></td>
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
      </div>
        <!-- /page content -->

      <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
@stop


    
   