<div class="top_nav">
          <div class="nav_menu">
            <nav role="navigation">
              <ul class="nav navbar-nav navbar-right">
                <li style="cursor: pointer;">
                  <a class="user-profile dropdown-toggle" data-toggle="dropdown">
                    {{Auth::user()->fName}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right" style="width: 250px" role="menu">
                    <li><a data-toggle="modal" href="#userDetailInformation">
                      <div class="user-profile-menu">
                        <p class="user-profile-desc">
                          <span class="user-profile-name">{{Auth::user()->fName}} {{Auth::user()->lName}}</span></br>{{Auth::user()->userId}}
                        </p>
                      </div>
                    </a></li>   

                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" ng-click="initLoadCash()" href="#addMoneyfromCEO"><!--<span class="badge bg-red pull-right">50%</span>--><span>Мөнгө цэнэглэх/CEO/</span></a></li>
                    @endif
                    
                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" href="#AddAdmin">Админ тохируулах</a></li>
                    @endif
                    
                    <li><a data-toggle="modal" href="#MakeSponsor1">Зуучлах</a></li>
                    
                    <li><a data-toggle="modal" href="#UserTrans">Мөнгө шилжүүлэх</a></li>
                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" href="#ChangeBonus">Урамшууллын мөнгөн дүн өөрчлөх</a></li>
                    @endif
                    @if ( Auth::user()->hasRole('Admin') )
                      <li><a data-toggle="modal" href="{{url('admin/users')}}">Хэрэглэгчийн жагсаалт</a></li>
                      <li><a data-toggle="modal" href="#AddMoneyFromAdmin">Мөнгө цэнэглэх/Админ/</a></li>
                    @endif
                    <li><a data-toggle="modal" href="#ChangePass">Нууц үг солих</a></li>
                    <li><a data-toggle="modal" href="#ChangeTan">Тан код солих</a></li>
                    <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i>Гарах</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-not">6</span>
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
                <li role="logo" href="#" style="float:left; cursor: pointer;">
                  <a class="logo">
                    <img src="{{asset('images/logo.png')}}">
                    <label>Сүлжээний систем</label>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!--MODAL STARTS HERE // ADD MONEY FROM ADMIN-->
    <div class="modal fade" id="AddMoneyFromAdmin" tabindex="-1" role="dialog" aria-labelledby="AddMoneyFromAdmin" aria-hidden="true" data-target="AddMoneyFromAdmin">
                          <div class="modal-dialog" ng-init="addAmount = 0">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Бэлэн мөнгө цэнэглэх</h4>
                              </div>
                              <div class="modal-body">
                                <form id="add-money-form" class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Цэнэглэх боломжит бэлэн мөнгөний хэмжээ</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>@{{ endAmount | currency : ""}}</label>
                                        <label>₮</label>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>  
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" ng-keydown="findUserKeyDown($event, 0, 'searchMoney', 'Y')" class="input-default search-input" ng-model="searchMoney" style="width: 100%" id="searchMoney" autocomplete="off">
                                        <div class="content-list" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUser(0, user, 'searchMoney', 'Y')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
                                                <div class="row">
                                                <div class="col-md-2"><img src="{{asset('images/img.jpg')}}" alt=""></div>
                                                <div class="col-md-10" style="vertical-align:middle; font-size:11px;">@{{user.fName + ' ' + user.lName}}</br>@{{user.userId}}</div>
                                                </div>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Дансан дахь бэлэн мөнгөний хэмжээ</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>@{{ endAmount | currency : ""}}</label>
                                        <label>₮</label>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="checkbox" name="toggle" id="toggle" style="display: none;" />
                                        <label for="toggle" class="vertical-centered-label"></label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input ng-model="addAmount" type="number" class="input-default" style="width: 100%">
                                      </div>
                                      <div class="clearfix"></div>
                                      <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Дансан дахь бэлэн мөнгө</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>@{{total() | currency : ""}}₮</label>
                                      </div>
                                    </div>
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Тайлбар</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" style="width: 100%"autocomplete="off">
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green" ng-click="loadUserCash()"><i class="fa fa-save"></i> Хадгалах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
</div>