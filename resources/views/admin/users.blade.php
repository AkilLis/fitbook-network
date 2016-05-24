@extends('layouts.master')
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
                      <a href="" id="btn-add" class="btn btn-green" data-toggle="modal" data-target="#basicModal"><i class="fa fa-plus"></i> Нэмэх</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                      <form method="GET" action = "{{url('admin/users')}}">
                        <input type="search" name="search" value="{{ old('search') }}" class="input-search" placeholder="Хэрэглэгчийн код, Хэрэглэгчийн нэр ..."/>
                      </form>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                          <th align="center" width="40%">Хэрэглэгч ID нэр</th>
                          <th align="center" width="15%">Төлөв</th>
                          <th align="center" width="15%">Шивэгч</th>
                          <th align="center" width="15%">Нууц код</th>
                          <th align="center" width="15%">Тан код</th>
                        </tr>
                      </thead>
                      <tbody id="tasks-list" name="tasks-list">
                        @foreach ($users as $user)
                        <tr id="user{{$user->id}}">
                          <td><div>{{$user->userId}}</div> <div>{{$user->fName}} {{$user->lName}}</div></td>
                          <td align="center">
                            @if ($user->isNetwork == 'Y')
                              <a>
                                <img id="img{{$user->id}}" src="{{asset('images/check.png')}}">
                              </a>
                            @else
                              <a>
                                <img id="img{{$user->id}}" src="{{asset('images/close.png')}}">
                              </a>
                            @endif
                          </td>
                          <td align="center">
                            @if ($user->registration == 1)
                              <a ng-click="detachRole('Registration', {{$user->id}})">
                                <img id="img{{$user->id}}" src="{{asset('images/check.png')}}">
                              </a>
                            @else
                              <a ng-click="attachRole('Registration', {{$user->id}})">
                                <img id="img{{$user->id}}" src="{{asset('images/close.png')}}">
                              </a>
                            @endif
                          </td>
                          <td><a href="#" id="pass_change_popover" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-title="Нууц үг" class="fa fa-key"></a></td>
                          <td><a href="#" id="tan_change_popover" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-title="Тан код" class="fa fa-key"></a></td>
                        </tr>
                        @endforeach
                      </tbody> 
                    </table>
                    <div id="pass_popover_content" style="display: none;">
                      <div class="pop-pass">1234</div>
                      <div class="pop-icon-vertical">
                        <img src="{{asset('images/check.png')}}" style="height:16px">
                        <img src="{{asset('images/close.png')}}" style="height:16px" >
                      </div>
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
        $("#pass_change_popover").popover({
          html: true,
          content:  function() {
            return $('#pass_popover_content').html();}
        });
        $("#tan_change_popover").popover({
          html: true,
          content:  function() {
            return $('#pass_popover_content').html();
            }
        });
        //var url = "http://103.17.108.49/admin/users";
        var url = "http://localhost/fitbook/public/admin/users";

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

            debugger;

            var formData = {
                  userId: $("#userId").val(),
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

    
   