<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Хэрэглэгчийн бүртгэл</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.min.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js" type="text/javascript"></script>
    <script src="http://m-e-conroy.github.io/angular-dialog-service/javascripts/dialogs.min.js" type="text/javascript"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                                          <img src="images/img.jpg" alt="Profile Image" />
                                      </span>
                        <span>
                                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                                          Film festivals used to be do-or-die moments for movie makers. They were where...
                                      </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a href="inbox.html">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

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

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery-2.2.3.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/dataTables.responsive.js')}}"></script>
	<script src="{{asset('js/ligro.js')}}"></script>
    <!-- Custom Theme Scripts -->
	
    <script src="js/custom.js"></script>
	
    <!-- Datatables -->
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
    <!-- /Datatables -->
  </body>
</html>