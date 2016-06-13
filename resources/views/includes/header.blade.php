<div class="top_nav" ng-controller="userCtrl">
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
                      <li><a href="{{url('admin/cash')}}"><!--<span class="badge bg-red pull-right">50%</span>--><span>Мөнгө цэнэглэх/CEO/</span></a></li>
                    @endif
                    
                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" ng-click="init('admin')">Админ тохируулах</a></li>
                    @endif
                    
                    <li><a data-toggle="modal" ng-click="init('sponser')">Зуучлах</a></li>
                    
                    <li><a data-toggle="modal" ng-click="init('moneyTrans')">Мөнгө шилжүүлэх</a></li>
                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" href="#ChangeBonus">Урамшууллын мөнгөн дүн өөрчлөх</a></li>
                    @endif

                    @if ( Auth::user()->hasRole('Admin') )
                      <li><a data-toggle="modal" ng-click="open()">Урамшуулал олгох</a></li>
                    @endif

                    @if ( Auth::user()->hasRole('Admin') )
                      <li><a data-toggle="modal" href="{{url('admin/users')}}">Хэрэглэгчийн жагсаалт</a></li>
                      <li><a href="{{url('admin/cash')}}">Мөнгө цэнэглэх/Админ/</a></li>
                    @endif
                    @if ( Auth::user()->hasRole('Registration') )
                    <li><a data-toggle="modal" ng-click="init('newUser')">Хэрэглэгч нэмэх</a></li>
                    @endif
                    <li><a data-toggle="modal" ng-click="init('changepassword')">Нууц үг солих</a></li>
                    <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i>Гарах</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-not" ng-bind="totalCount"></span>
                  </a>
                      <div id="style-3" class="scrolldiv msg_list dropdown-menu" role="menu" style="border-top:1px solid #5A738E; width: 300px !important; ">
                        <ul class="list-unstyled" >
                          <li ng-repeat="notif in notifications" class="list-not">
                            <a>
                              <div class="row">
                                <div class="col-md-11">
                                  <div class="col-md-12">
                                    <span class="time">@{{notif.created_at}}</span>
                                  </div>
                                  <div class="col-md-12">
                                    <span class="message">
                                        @{{notif.description}}
                                    </span>
                                  </div>
                                </div>
                                <div class="col-md-1" style="vertical-align: middle; margin-top: 15px; display: block;margin-top: 2%; margin-left: -4%;">
                                  <i data-toggle="tooltip" data-container="body" data-placement="top" title="Уншсан болгох" class="fa fa-check-circle org-terques" style="font-size: 10px !important;"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                </li>
                <li role="logo" href="#" style="float:left; cursor: pointer;">
                  <a class="logo" href="{{url('/dashboard')}}">
                    <div class="row">
                      <div class="col-lg-2 col-md-2">
                        <img src="{{asset('images/logo.png')}}">
                      </div>
                      <div class="hidden-sm hidden-xs col-lg-10 col-md-10">
                        <label>Сүлжээний систем</label>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
</div>