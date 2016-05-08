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
              <a href="" id="btn-add" class="btn btn-green" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus"></i> Нэмэх</a>
            </div>
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Хэрэглэгчийн бүртгэл</h4>
                </div>
                <div class="modal-body">
                @if (count($errors) > 0)
                                    <div class="alert alert-danger" style="margin-top: 0px;">
                                        <strong>Ups!</strong> Existe algum problema com o formulário.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                <form name="myForm" class="reg-modal form-group" method="post" action="{{url('admin/users')}}">

                 <div class="row">
                  <div class="col-md-4 vertical-centered-label">
                    <label>Хэрэглэгчийн код</label>
                  </div>
                  <div class="col-md-8">
                    <input name="userId" ng-model="userId" required class="input-default" type="text" style="width:100%"/>
                    <span ng-show="myForm.userId.$touched && myForm.userId.$invalid">Хэрэглэгчийн код заавал оруулах хэрэгтэй!.</span>
                  </div>
                  <div class="clearfix"></div>    
                  <div class="col-md-4 vertical-centered-label">
                    <label>Овог</label>
                  </div>
                  <div class="col-md-8">
                    <input name="nameL" required ng-model="nameL" class="input-default" type="text" style="width:100%"/>
                    <span ng-show="myForm.nameL.$touched && myForm.nameL.$invalid">Овог оруулна уу.</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Нэр</label>
                  </div>
                  <div class="col-md-8">
                    <input name="nameF" required ng-model="nameF" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Регистрийн №</label>
                  </div>
                  <div class="col-md-8">
                    <input name="registryNo" required ng-model="registryNo" class="input-default" type="text" style="width:100%"/>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 vertical-centered-label">
                    <label>Дансны дугаар</label>
                  </div>
                  <div class="col-md-8">
                    <input name="accountId" required ng-model="accountId" class="input-default" type="text" style="width:100%"/>
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
                    <input name="email" ng-model="email" class="input-default" type="email" style="width:100%"/>
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
                </div>
                <div class="modal-footer">
                <button type="button" ng-disabled="myForm.$invalid" id="btn-save" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <form method="GET" action = "{{url('admin/users')}}">
                  <input type="search" name="search" value="{{ old('search') }}" class="input-search" placeholder="Хэрэглэгчийн код, Хэрэглэгчийн нэр ..."/>
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
                              <td>{{$user->userId}}</td>
                              <td>{{$user->fName}} {{$user->lName}}</td>
                              <td><a href="#">Дэлгэрэнгүй</a></td>
                              <td align="center"><img class="imgCheck" src="{{asset('images/check.png')}}" style="height:16px" ></td>
                              <td align="center"><img src="{{asset('images/check.png')}}" style="height:16px" ></td>
                              <td><a href="#">Нууц үг авах</a></td>
                              <td><a href="#">Тан авах</a></td>
                          </tr>
                        @endforeach
                      </tbody> 
                    </table>
                    <div style="text-align: center;">{{ $users->appends(Request::only('search'))->links() }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- /page content -->
      <meta name="_token" content="{!! csrf_token() !!}" />
      <script>
      $(document).ready(function() 
      {
        var url = "/fitbook/public/admin/users";

        $('#btn-add').click(function (e)
        {
            $('#btn-save').val("add");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            e.preventDefault(); 

            var my_url = url + "/create";
            
            $.ajax({
                  type: "GET",
                  url: my_url,
                  data: null,
                  dataType: 'json',
                  success: function (data) {
                      
                  },
                  error: function (data) {
                     
                  }
              });
          });

        //create new task / update existing task
        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            e.preventDefault(); 

            var formData = {
                  userId: $( "input[name*='userId']" ).val(),
                  fName: $( "input[name*='nameF']" ).val(),
                  lName: $( "input[name*='nameL']" ).val(),
                  email: $( "input[name*='email']" ).val(),
                  address: $( "input[name*='address']" ).val(),
                  phone: $( "input[name*='phone']" ).val(),
                  registryNo: $( "input[name*='registryNo']" ).val(),
                  accountId: $( "input[name*='accountId']" ).val(),
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();

            var type = "POST"; //for creating new resource
            console.log(formData);
            console.log(my_url);
            var my_url = url;

            $.ajax({

                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    debugger;
                    if (data.errors != null) {

                    }
                    else{
                      location.reload();  
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
          });
      });
    </script>
@stop


    
   