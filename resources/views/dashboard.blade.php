<!DOCTYPE html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FitBook | </title>
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
      <div class="main_container">
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown">
                    <img src="images/img.jpg" alt="">Түвшинбат Гансүх
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right" role="menu">
                    <li><a data-toggle="modal" href="#userDetailInformation">
                      <div class="user-profile-menu">
                        <img src="images/user.png" class="user-profile-pic">
                        <p class="user-profile-desc">
                          <span class="user-profile-name">Түвшинбат ГАНСҮХ</span></br>AA00000000
                        </p>
                      </div>
                    </a></li>   
                    <li><a data-toggle="modal" href="#addMoneyfromCEO"><!--<span class="badge bg-red pull-right">50%</span>--><span>Мөнгө оруулах/CEO/</span></a></li>
                    <li><a data-toggle="modal" href="#AddAdmin">Админ тохируулах</a></li>
                    <li><a data-toggle="modal" href="#MakeSponsor1">Спонсорлох</a></li>
                    <li><a data-toggle="modal" href="#UserTrans">Мөнгө шилжүүлэх</a></li>
                    <li><a data-toggle="modal" href="#ChangeBonus">Урамшууллын мөнгөн дүн өөрчлөх</a></li>
                    <li><a data-toggle="modal" href="{{url('admin/users')}}">Хэрэглэгчийн жагсаалт</a></li>
                    <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i>Гарах</a></li>
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
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-12">
              <div class="x_panel tile">
                <div class="row x_title">
                  <div class="col-md-12">
                  <h3>Дансний мэдээлэл</h3>
                  </div>
                </div>
                  <a class="col-md-2 col-md-offset-1 tile_stats_count" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-money"></i> Бэлэн мөнгө</span>
                    <div class="count">20,250,000 ₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Урамшуулал</span>
                    <div class="count">560,000 ₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-trophy"></i> Шагнал</span>
                    <div class="count">2,500₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-user"></i> Хэрэглээ</span>
                    <div class="count">4,567₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-hourglass-half"></i> Хуримтлал</span>
                    <div class="count">860,000 ₮</div>
                  </a>
               </div>
            </div>
          </div>
          <!-- /top tiles -->
        <div class="row">
          <div class="col-md-8">
            <div class="x_panel tile fixed_height_450">
              <div class="row x_title">
                <div class="col-md-12">
                <h3>Блокын мэдээлэл</h3>  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table class="block-table">
                    <tr>
                      <td><div class="hexagon">
                        <div class="hexTop"></div>
                        <div class="hexBottom"></div>
                      </div></td>
                      <td><img src="images/img.jpg " class="block-img"></td>
                      <td><img src="images/img.jpg " class="block-img"></td>
                      <td><img src="images/img.jpg " class="block-img"></td>
                      <td><img src="images/img.jpg " class="block-img"></td>
                      <td><img src="images/img.jpg " class="block-img"></td>
                      <td><img src="images/img.jpg " class="block-img"></td>
                    </tr>
                  </table>
                </div>
              </div>
             </div>
          </div>
          <div class="col-md-4">
              <div class="x_panel tile fixed_height_450">
              <div class="row x_title">
                <div class="col-md-12">
                <h3>Манай баг</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-centered">
                  <div class="tree">
                    <ul>
                    <li>
                      <a href="#">Parent</a>
                      <ul>
                      <li>
                        <a href="#">Child</a>
                        <ul>
                        <li><a href="#">Grand Child</a></li>
                        <li>
                          <a href="#">Grand Child</a>
                        </li>
                        <li><a href="#">Grand Child</a></li>
                        <li><a href="#">Grand Child</a></li> 
                        </ul>
                      </li>
                      </ul>
                    </li>
                    </ul>
                  </div>
                </div>
              </div>
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
            Startup
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script src="{{asset('js/jquery-2.2.3.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/ligro.js')}}"></script>
    <!--MODAL STARTS HERE // USER DETAIL INFORMATION DIALOG-->
    <div class="modal fade" id="userDetailInformation" tabindex="-1" role="dialog" aria-labelledby="userDetailInformation" aria-hidden="true" data-target="userDetailInformation">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Хувийн мэдээлэл</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                   <div class="row">
                                    <div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Хэрэглэгчийн код</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      </div>
                                      <div class="clearfix"></div>    
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Овог</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Нэр</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Регистрийн №</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Банк</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Дансны дугаар</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Гэрийн хаяг</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Цахим шуудан</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Утасны дугаар</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </form>
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                                <button type="button" class="btn btn-green controls" id="information-edit">Засах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ADD MONEY FROM CEO DIALOG-->
    <div class="modal fade" id="addMoneyfromCEO" tabindex="-1" role="dialog" aria-labelledby="addMoneyfromCEO" aria-hidden="true" data-target="addMoneyfromCEO">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Мөнгө оруулах</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Дансан дахь бэлэн мөнгөний хэмжээ</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>100,000₮</label>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="checkbox" name="toggle" id="toggle" style="display: none;" />
                                        <label for="toggle" class="vertical-centered-label"></label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="number" class="input-default" style="width: 100%">
                                      </div>
                                      <div class="clearfix"></div>
                                      <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Дансан дахь бэлэн мөнгө</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>100,000₮</label>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ADD ADMIN FROM CEO DIALOG-->
    <div class="modal fade" id="AddAdmin" tabindex="-1" role="dialog" aria-labelledby="AddAdmin" aria-hidden="true" data-target="AddAdmin">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Админ нэмэх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-3 vertical-centered-label">
                                        <label>Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-5 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <button type="button" class="btn btn-green"><i class="fa fa-plus"> Нэмэх</i></button>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="50%">Хэрэглэгчийн код</th>
                                          <th width="50%">Овог, нэр</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Tiger</td>
                                          <td>Nixon</td>
                                        </tr>
                                        <tr>
                                          <td>Garrett</td>
                                          <td>Winters</td>
                                        </tr>
                                        <tr>
                                          <td>Ashton</td>
                                          <td>Cox</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // MAKE ACTIVATION FROM ALL USERS DIALOG-->
    <div class="modal fade" id="MakeSponsor1" tabindex="-1" role="dialog" aria-labelledby="MakeSponsor1" aria-hidden="true" data-target="MakeSponsor1">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Спонсорлох</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Спонсор сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Түвшинбат Гансүх" style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Идэвхижүүлэх хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-check"></i> Идэвхижүүлэх</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // TRANSACTION DIALOG-->
    <div class="modal fade" id="UserTrans" tabindex="-1" role="dialog" aria-labelledby="UserTrans" aria-hidden="true" data-target="UserTrans">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Мөнгө шилжүүлэх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Түвшинбат Гансүх" style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>   
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="40%">Данс</th>
                                          <th width="30%">Дансан дахь үлдэгдэл</th>
                                          <th width="30%">Шилжүүлэг хийх дүн</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Урамшуулал</td>
                                          <td>100,000₮</td>
                                          <td contenteditable="true"></td>
                                        </tr>
                                        <tr>
                                          <td>Шагнал</td>
                                          <td>300,000₮</td>
                                          <td contenteditable="true"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="clearfix"></div> 
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Тан код оруулах</label>
                                      </div>
                                      <div class="col-md-5 vertical-centered-label">
                                        <input type="text" class="input-default" style="width: 90%;">
                                      </div>
                                      <div class="col-md-1 vertical-centered-label">
                                        <label class="fa fa-key" style="vertical-align: middle; text-align: left;"></label>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-envelope-o"></i> Илгээх</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // CHANGE BONUS DIALOG-->
    <div class="modal fade" id="ChangeBonus" tabindex="-1" role="dialog" aria-labelledby="ChangeBonus" aria-hidden="true" data-target="ChangeBonus">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Урамшууллын мөнгөн дүн өөрчлөх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                    <form>
                                      <select class="ChooseCombo">
                                        <option>Анхан шат</option>
                                        <option>Ахьсан шат</option>
                                      </select>
                                    </form>
                                    </div>
                                    <div class="clearfix"></div>   
                                    <ul class="nav nav-tabs" style="margin-left: 10px; margin-right: 10px;">
                                      <li class="active"><a data-toggle="tab" href="#firstStep">1р шат - Хамтрах шат</a></li>
                                      <li><a data-toggle="tab" href="#secondStep">2р шат - Өсөх</a></li>
                                      <li><a data-toggle="tab" href="#thirdStep">3р шат - Баяжих</a></li>
                                      <li><a data-toggle="tab" href="#thirdStep">Менежер</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <div id="firstStep" class="tab-pane fade in active">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th width="40%">Урамшууллын нэр</th>
                                              <th width="30%">Мөнгөн дүн</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Ахлагчийн урамшуулал</td>
                                              <td contenteditable="true">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true">24000₮</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="secondStep" class="tab-pane fade">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th width="40%">Урамшууллын нэр</th>
                                              <th width="30%">Мөнгөн дүн</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Ахлагчийн урамшуулал</td>
                                              <td contenteditable="true">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>0 хүн</td>
                                              <td contenteditable="true">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true">24000₮</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="thirdStep" class="tab-pane fade">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th width="40%">Урамшууллын нэр</th>
                                              <th width="30%">Мөнгөн дүн</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Ахлагчийн урамшуулал</td>
                                              <td contenteditable="true">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>0 хүн</td>
                                              <td contenteditable="true">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true">24000₮</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ACCOUNT DETAIL-->
    <div class="modal fade" id="AccountDetail" tabindex="-1" role="dialog" aria-labelledby="AccountDetail" aria-hidden="true" data-target="AccountDetail">
      <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Гүйлгээний түүх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div  class="col-md-7">
                                      <input type="text" class="input-default">
                                    </div>
                                    <div  class="col-md-5">
                                    <form>
                                      <select class="ChooseCombo">
                                        <option>Бүх данс</option>
                                        <option>Бэлэн мөнгөний данс</option>
                                        <option>Урамшуулалын данс</option>
                                        <option>Шагналын данс</option>
                                        <option>Хэрэглээний данс</option>
                                        <option>Хуримтлалын данс</option>
                                      </select>
                                    </form>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="5%">Гүйлгээний огноо</th>
                                          <th width="15%">Дансны нэр</th>
                                          <th width="30%">Гүйлгээний утга</th>
                                          <th width="20%">Харьцсан дансны нэр</th>
                                          <th width="10%">Орлого</th>
                                          <th width="10%">Зарлага</th>
                                          <th width="10%">Үлдэгдэл</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>16/04/15</td>
                                          <td>Урамшуулал</td>
                                          <td>Бат - Хэрэглэгчээс</td>
                                          <td>Бусад</td>
                                          <td>100,000₮</td>
                                          <td></td>
                                          <td>100,000₮</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
  </body>
</html>