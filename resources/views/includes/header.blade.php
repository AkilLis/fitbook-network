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
                      <li><a data-toggle="modal" ng-click="init()" href="#addMoneyfromCEO"><!--<span class="badge bg-red pull-right">50%</span>--><span>Мөнгө цэнэглэх/CEO/</span></a></li>
                    @endif
                    
                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" ng-click="init()" href="#AddAdmin">Админ тохируулах</a></li>
                    @endif
                    
                    <li><a data-toggle="modal" ng-click="init()" href="#MakeSponsor1">Зуучлах</a></li>
                    
                    <li><a data-toggle="modal" href="#UserTrans">Мөнгө шилжүүлэх</a></li>
                    @if ( Auth::user()->hasRole('Ceo') )
                      <li><a data-toggle="modal" href="#ChangeBonus">Урамшууллын мөнгөн дүн өөрчлөх</a></li>
                    @endif
                    @if ( Auth::user()->hasRole('Admin') )
                      <li><a data-toggle="modal" href="{{url('admin/users')}}">Хэрэглэгчийн жагсаалт</a></li>
                      <li><a data-toggle="modal" ng-click="init()" href="#AddMoneyFromAdmin">Мөнгө цэнэглэх/Админ/</a></li>
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
                                          <img src="{{asset('images/img.jpg')}}" alt="Profile Image" />
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
</div>