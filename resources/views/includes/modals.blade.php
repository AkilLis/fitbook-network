<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ligro.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular-route.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ui-bootstrap-tpls-1.3.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('app/app.js')}}"></script>
<script type="text/javascript" src="{{asset('app/controller/usercontroller.js')}}"></script>
<script type="text/javascript" src="{{asset('app/controller/cashcontroller.js')}}"></script>
<script type="text/javascript" src="{{asset('app/filter/customType.js')}}"></script>
<script type="text/javascript" src="{{asset('app/directive/custom-directive.js')}}"></script>
<script type="text/javascript" src="{{asset('js/enscroll-0.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap2-toggle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/loadingoverlay.min.js')}}"></script>

<!--MODAL ENDS HERE-->
<!--MODAL STARTS HERE // USER DETAIL INFORMATION DIALOG-->
<div ng-controller="mainCtrl">
    <!--MODAL STARTS HERE // USER DETAIL INFORMATION DIALOG-->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Хэрэглэгчийн бүртгэл</h4>
                            </div>
                            <div class="modal-body">
                              <form name="myForm" id="myForm" class="reg-modal form-group">
                                <div class="row">
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Хэрэглэгчийн код</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="userId" disabled="true" ng-model="userId" id="userId" class="input-default" type="text" style="width:100%"/>
                                    <span ng-show="myForm.userId.$touched && myForm.userId.$invalid">Хэрэглэгчийн код заавал оруулах хэрэгтэй!.</span>
                                  </div>
                                  <div class="clearfix"></div>    
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Овог</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="nameL" required ng-model="nameL" class="input-default" type="text" style="width:100%"/>
                                    <span ng-show="myForm.nameL.$touched && myForm.nameL.$invalid">Овог оруулна уу.</span>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Нэр</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="nameF" required ng-model="nameF" class="input-default" type="text" style="width:100%"/>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Регистрийн №</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="registryNo" required ng-model="registryNo" class="input-default" type="text" style="width:100%"/>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Дансны дугаар</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="accountId" ng-model="accountId" class="input-default" type="text" style="width:100%"/>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Гэрийн хаяг</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="address" class="input-default" type="textarea" style="width:100%"/>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Цахим шуудан</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="email" ng-model="email" class="input-default" type="text" style="width:100%"/>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
                                    <label>Утасны дугаар</label>
                                  </div>
                                  <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
                                    <input name="phone" class="input-default" type="tel" style="width:100%"/>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" ng-disabled="myForm.$invalid" ng-click="newUser()" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                            </div>
                          </div>
                        </div>
    </div>

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
                              <div class="modal-body" ng-init="endAmount = 0">
                                <form name="formCeo" id="addMoneyForm" class="reg-modal form-group">
                                  <div class="row">
                                    
                                    @if ( Auth::user()->hasRole('Admin') )
                                      <div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                          <label style="padding-left: 10px">Цэнэглэх боломжих бэлэн мөнгөний хэмжээ</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                          <label class="wrap">@{{endAmount | currency : ""}}₮</label>
                                        </div>
                                      </div>
                                      <div class="clearfix">
                                      </div>  
                                    @endif

                                    <div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <input type="text" ng-keydown="findUserKeyDown($event, 'N')" class="input-default search-input wrap" ng-model="searchUser" style="width: 100%" id="searchMoney" autocomplete="off">
                                        <top-users></top-users>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <input type="checkbox" name="toggle" id="toggle" style="display: none;" />
                                        <label for="toggle" class="vertical-centered-label"></label>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <input ng-model="addAmount" type="number" class="input-default currenyAmount wrap" style="width: 100%">
                                      </div>
                                      <div class="clearfix"></div>
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
    <!--MODAL STARTS HERE // ADD ADMIN FROM CEO DIALOG-->
    <div class="modal fade" id="AddAdmin" tabindex="-1"  role="dialog" aria-labelledby="AddAdmin" aria-hidden="true" data-target="AddAdmin">
              <div class="modal-dialog"> 
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" id="btn-add" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Админ нэмэх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group">
                                  <div class="row">
                                    <div>
                                      <div class="col-md-3 vertical-centered-label">
                                        <label>Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-5 vertical-centered-label">
                                        <input type="text" id="searchAdmin" ng-keydown="findUserKeyDown($event,'N')" name="userId" ng-model="searchUser" autocomplete="off" class="input-search search-input" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 80%;">
                                        <top-users></top-users>
                                      </div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <button type="button" ng-click="attachAdmin()" class="btn btn-green"><i class="fa fa-plus"> Нэмэх</i></button>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="40%">Хэрэглэгчийн код</th>
                                          <th width="40%">Овог, нэр</th>
                                          <th width="5%"> </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr ng-repeat="user in users">
                                          <td>@{{user.userId}}</td>
                                          <td>@{{user.fName + ' ' + user.lName}}</td>
                                          <td style="cursor: pointer; text-align: center; vertical-align: middle; font-size: 15px">
                                            <a ng-click="detachAdmin(user.id, $index)" class="fa fa-trash"></a>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </form>
                              </div>
                            </div>
              </div>  
        <meta name="_token" content="{!! csrf_token() !!}" />           
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // MAKE ACTIVATION FROM ALL USERS DIALOG-->
    <div class="modal fade" id="MakeSponsor1" tabindex="-1" role="dialog" aria-labelledby="MakeSponsor1" aria-hidden="true" data-target="MakeSponsor1">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Зуучлах</h4>
                              </div>
                              <div class="modal-body">
                                <form id="sponserForm" class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Зуучлагч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" value="{{Auth::user()->userId}}" id="searchSponser" name="searchSponser" ng-model="searchUser" autocomplete="off" class="input-search search-input" ng-keydown="findUserKeyDown($event, 'N')" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                        <top-users></top-users>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div> 
                                  
                                    <input type="checkbox" checked="true" id="rank" data-toggle="toggle" data-on="Анхан шат" data-off="Ахисан шат" data-onstyle="changebonus-beginner" data-offstyle="changebonus-advanced">
                                    
                                    <div class="clearfix"></div>   
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Идэвхижүүлэх хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" id="searchActivated" ng-keydown="findUserKeyDownSecond($event, 0, 'searchActivated', 'N')" name="searchActivated" ng-model="searchActivated" autocomplete="off" class="input-search search-input-second" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                        <div class="content-list-second" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUserSecond(user, 'N')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
                                                <div style="vertical-align:middle; font-size:11px;">@{{user.fName + ' ' + user.lName}}</br>@{{user.userId}}</div>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="40%">Данс</th>
                                          <th width="30%">Дансан дахь үлдэгдэл</th>
                                          <th width="30%">Идэвхижүүлэх дүн</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Бэлэн мөнгө</td>
                                          <td>@{{endAmount | currency : ""}}₮</td>
                                          <td>
                                            <input id="activate_endcash" class="borderless-input" type="text" ng-model="edEndAmount"/>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Шагнал</td>
                                          <td>@{{shAwardAmount | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edAwardAmount"/>
                                          </td>
                                        </tr>

                                        <tr ng-show="isShown(1)">
                                          <td colspan="3">Анхан</td>
                                        </tr>
                                        <tr ng-show="isShown(1)">
                                          <td>Урамшуулал</td>
                                          <td>@{{shBonusAmountBg | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edBonusAmountBg"/>
                                          </td>
                                        </tr>

                                        <tr ng-show="isShown(2)">
                                          <td colspan="3">Ахисан</td>
                                        </tr>
                                        <tr ng-show="isShown(2)">
                                          <td>Урамшуулал</td>
                                          <td>@{{shBonusAmountAd | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edBonusAmountAd"/>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" ng-click="activateUser()" class="btn btn-green"><i class="fa fa-check"></i> Идэвхижүүлэх</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // TRANSACTION DIALOG-->
    <div class="modal fade" id="UserTrans" tabindex="-1" role="dialog" aria-labelledby="UserTrans" aria-hidden="true" data-target="UserTrans">
      <div class="modal-dialog" ng-init="getAccountInfo()"> 
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Мөнгө шилжүүлэх</h4>
                              </div>
                              <div class="modal-body">
                                <form id="usertranForm" name="usertranForm" class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" id="searchTrans" name="searchTrans" required ng-model="searchUser" autocomplete="off" class="input-search search-input" ng-keydown="findUserKeyDown($event,'N')" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                        <top-users></top-users>
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
                                          <td >Шагнал</td>
                                          <td>@{{shAwardAmount | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edAwardAmount"/>
                                          </td>
                                        </tr>

                                        <tr ng-show="isShown(1)">
                                          <td colspan="3">Анхан</td>
                                        </tr>

                                        <tr ng-show="isShown(1)">
                                          <td>Урамшуулал</td>
                                          <td>@{{shBonusAmountBg | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edBonusAmountBg"/>
                                          </td>
                                        </tr>
                                        
                                        <tr ng-show="isShown(2)">
                                          <td colspan="3">Ахисан</td>
                                        </tr>
                                        <tr ng-show="isShown(2)">
                                          <td>Урамшуулал</td>
                                          <td>@{{shBonusAmountAd | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edBonusAmountAd"/>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="clearfix"></div>
                                    <div style="margin-left: auto; margin-right: auto; width:90%;">
                                      <div class="form-group">
                                        <label for="comment">Тайлбар :</label>
                                        <textarea class="form-control" rows="2" ng-model="description"></textarea>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div> 
                                    <div class="clearfix"></div> 
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Тан код оруулах</label>
                                      </div>
                                      <div class="col-md-5 vertical-centered-label">
                                        <input type="password" ng-model="tokenPassword" maxlength="4" class="input-default" style="width: 90%;">
                                      </div>
                                      <div class="col-md-1 vertical-centered-label">
                                        <label class="fa fa-key" style="vertical-align: middle; text-align: left;"></label>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" ng-click="makeTransaction()" class="btn btn-green"><i class="fa fa-envelope-o"></i> Илгээх</button>
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
                                    <form>
                                      <input type="checkbox" data-toggle="toggle" data-on="Анхан шат" data-off="Ахисан шат" data-onstyle="changebonus-beginner" data-offstyle="changebonus-advanced">
                                    </form>
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
                                              <td contenteditable="true" class="editable">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true" class="editable">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true" class="editable">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true" class="editable">24000₮</td>
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
                                              <td contenteditable="true" class="editable">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true" class="editable">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>0 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true" class="editable">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true" class="editable">24000₮</td>
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
                                              <td contenteditable="true" class="editable">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true" class="editable">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>0 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true" class="editable">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true" class="editable">24000₮</td>
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
    <script type="text/ng-template" id="accountdetail.html">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Гүйлгээний түүх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" name="accDtlForm">
                                  <div class="row">
                                    <div  class="col-md-4">
                                      <div class="container">
                                        <div class="row" style="margin-top: -10px; display:none;">
                                            <div class='col-md-6'>
                                                <div class="form-group">
                                                    <div class='input-group date' id='datetimepicker6'>
                                                        <input type='text' class="input-datepicker form-control input-group-addon" placeholder="Эхлэх огноо" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class="form-group">
                                                    <div class='input-group date' id='datetimepicker7'>
                                                        <input type='text' class="input-datepicker form-control input-group-addon" placeholder="Дуусах огноо"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div  class="col-md-5">
                                      <input type="text" class="input-search AccountDetails" placeholder="Дансны нэр, Гүйлгээний утга, Харьцсан дансны нэр">
                                    </div>
                                    <div  class="col-md-3">
                                    <form>
                                      <select ng-model="accountType" class="ChooseCombo" ng-change="getAccountByType()">
                                        <option value="All">Бүх данс</option>
                                        <option value="Cash">Бэлэн мөнгөний данс</option>
                                        <option value="Bonus">Урамшуулалын данс</option>
                                        <option value="Award">Шагналын данс</option>
                                        <option value="Usage">Хэрэглээний данс</option>
                                        <option value="Saving">Хуримтлалын данс</option>
                                      </select>
                                    </form>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="10%">Гүйлгээний огноо</th>
                                          <th width="10%">Дансны нэр</th>
                                          <th width="10%">Шилжүүлсэн</th>
                                          <th width="25%">Гүйлгээний утга</th>
                                          <th width="15%">Орлого</th>
                                          <th width="15%">Зарлага</th>
                                          <th width="15%">Үлдэгдэл</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr ng-repeat="data in accountDatas">
                                          <td>@{{data.invDate}}</td>
                                          <td>@{{data.invType | accountType}}</td>
                                          <td>@{{data.in_user.userId}}</td>
                                          <td>@{{data.invDescription}}</td>
                                          <td ng-style="data.inAmt != 0 && {'color' : 'green'}">@{{data.inAmt | currency : ""}}₮</td>
                                          <td ng-style="data.outAmt != 0 && {'color' : 'red'}">@{{data.outAmt | currency : ""}}₮</td>
                                          <td>@{{data.endAmt | currency : ""}}₮</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div style="text-align: center;">
                                      <posts-pagination></posts-pagination>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
    </script>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ADD MONEY FROM ADMIN-->
    <div class="modal fade" id="ChangePass" tabindex="-1" role="dialog" aria-labelledby="ChangePass" aria-hidden="true" data-target="ChangePass">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Нууц үг солих</h4>
                              </div>
                              <div class="modal-body">
                                <form name="changeForm" id="changeForm" class="reg-modal form-group" novalidate>
                                  <div class="row">
                                        <div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <label style="padding-left: 10px">Хуучин нууц үг оруулах</label>
                                          </div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <input id="oldPassword" type="password" class="input-default pass-space">
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <label style="padding-left: 10px">Шинэ нууц үг оруулах</label>
                                          </div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <input id="newPassword" type="password" class="input-default pass-space">
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <label style="padding-left: 10px">Давтан оруулах</label>
                                          </div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <input id="verifyPassword" type="password" class="input-default pass-space">
                                          </div>
                                        </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green" ng-click="setPassword()"><i class="fa fa-save"></i> Хадгалах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ADD MONEY FROM ADMIN-->
    <div class="modal fade" id="ChangeTan" tabindex="-1" ro le="dialog" aria-labelledby="ChangeTan" aria-hidden="true" data-target="ChangeTan">
                          <div class="modal-dialog" ng-init="addAmount = 0">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Тан код солих</h4>
                              </div>
                              <div class="modal-body">
                                <form id="add-money-form" class="reg-modal form-group" >
                                  <div class="row">
                                        <div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <label style="padding-left: 10px">Хуучин тан код оруулах</label>
                                          </div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <input type="password" class="input-default pass-space">
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <label style="padding-left: 10px">Шинэ тан код оруулах</label>
                                          </div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <input type="password" class="input-default pass-space">
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <label style="padding-left: 10px">Давтан оруулах</label>
                                          </div>
                                          <div class="col-md-6 vertical-centered-label">
                                            <input type="password" class="input-default pass-space">
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

    <!--MODAL STARTS HERE // ADMIN DIALOG-->
    <div class="modal fade" id="GiveSalary" tabindex="-1" role="dialog" aria-labelledby="GiveSalary" aria-hidden="true" data-target="GiveSalary">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Урамшуулал олгох</h4>
                              </div>
                              <div class="modal-body">
                                <form name="giveSalaryForm" id="giveSalaryForm" class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" id="searchSalary" name="searchSalary" required ng-model="searchUser" autocomplete="off" class="input-search search-input" ng-keydown="findUserKeyDown($event, 'Y')" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                      <div class="content-list" id="list">
                                        <ul class="drop-list">
                                          <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              'Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                          </li>
                                          <li ng-repeat="user in top5users">
                                            <a ng-click="chooseUser(user, 'Y')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
                                            <div style="vertical-align:middle; font-size:11px;">@{{user.lName + " " + user.fName}}</br>@{{user.userId}}</div>
                                            </a> 
                                          </li>
                                        </ul>
                                      </div>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>   
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="40%">Данс</th>
                                          <th width="30%">Дансан дахь үлдэгдэл</th>
                                          <th width="30%">Урамшуулал олгох дүн</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td >Шагнал</td>
                                          <td>@{{shAwardAmount | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edAwardAmount"/>
                                          </td>
                                        </tr>

                                        <tr ng-show="isShown(1)">
                                          <td colspan="3">Анхан</td>
                                        </tr>

                                        <tr ng-show="isShown(1)">
                                          <td>Урамшуулал</td>
                                          <td>@{{shBonusAmountBg | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edBonusAmountBg"/>
                                          </td>
                                        </tr>
                                        
                                        <tr ng-show="isShown(2)">
                                          <td colspan="3">Ахисан</td>
                                        </tr>
                                        <tr ng-show="isShown(2)">
                                          <td>Урамшуулал</td>
                                          <td>@{{shBonusAmountAd | currency : ""}}₮</td>
                                          <td>
                                            <input class="borderless-input" type="text" ng-model="edBonusAmountAd"/>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" ng-click="takeSalary()" class="btn btn-green"><i class="fa fa-envelope-o"></i> Илгээх</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->

    <!--MODAL ENDS HERE-->
    <div id="loader" >
      <img src="{{asset('images/loader.gif')}}"/>
    </div>

    <script type="text/ng-template" id="giveSalary.html">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" ng-click="close()" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">123</h4>
            </div>
            <div class="modal-body">
              <p>Here's a more complex modal, it contains a form, data is passed to the controller 
               and data is returned from the modal.</p>
              
              <ul>
                <li ng-class="bread.class" ng-repeat="bread in accountDatas">
                        @{{bread.invDate}}
                </li>
              </ul>
              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Your Name" ng-model="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="age" class="col-sm-2 control-label">Age</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputPassword3" placeholder="Age" ng-model="age">
                  </div>
                </div>
              </form>

            </div>
            <div class="modal-footer">
              <button type="button" ng-click="open()" class="btn btn-primary" data-dismiss="modal">OK</button>
              <button type="button" ng-click="cancel()" class="btn">Cancel</button>
            </div>
          </div>
</script>
</div>


    