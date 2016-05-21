<!--MODAL STARTS HERE // USER DETAIL INFORMATION DIALOG-->
<div ng-controller="mainCtrl">
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
                                    <div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <label style="padding-left: 10px">Цэнэглэх боломжих бэлэн мөнгөний хэмжээ</label>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <label class="wrap">@{{total() | currency : ""}}₮</label>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>  
                                    <div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                                        <input type="text" ng-keydown="findUserKeyDown($event, 0, 'searchMoney', 'Y')" class="input-default search-input wrap" ng-model="searchMoney" style="width: 100%" id="searchMoney" autocomplete="off">
                                        <div class="content-list" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUser(0, user, 'searchMoney', 'Y')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
                                                <div style="vertical-align:middle; font-size:11px;">@{{user.fName + ' ' + user.lName}}</br>@{{user.userId}}</div>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
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
                                        <input type="text" id="searchAdmin" ng-keydown="findUserKeyDown($event, 0, 'searchAdmin', 'N')" name="userId" ng-model="searchAdmin" autocomplete="off" class="input-search" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 80%;">
                                        <input type="hidden" id="searchAdminId">
                                        <div class="content-list" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUser(1, user, 'searchAdmin')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
                                                <div class="row">
                                                <div class="col-md-2"><img src="{{asset('images/img.jpg')}}" alt=""></div>
                                                <div class="col-md-10" style="vertical-align:middle; font-size:11px;">@{{user.fName + ' ' + user.lName}}</br>@{{user.userId}}</div>
                                                </div>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
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
                                        <input type="text" value="{{Auth::user()->userId}}" id="searchSponser" name="searchSponser" ng-model="searchSponser" autocomplete="off" class="input-search" ng-keydown="findUserKeyDown($event, 0, 'searchSponser', 'N')" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                        <div class="content-list" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUser(2, user, 'searchSponser')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
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
                                  
                                    <input type="checkbox" checked="true" id="rank" data-toggle="toggle" data-on="Анхан шат" data-off="Ахисан шат" data-onstyle="changebonus-beginner" data-offstyle="changebonus-advanced">
                                    
                                    <div class="clearfix"></div>   
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Идэвхижүүлэх хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" id="searchActivated" ng-keydown="findUserKeyDown($event, 0, 'searchActivated', 'N')" name="searchActivated" ng-model="searchActivated" autocomplete="off" class="input-search" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                        <input type="hidden" id="searchActivatedId">
                                        <div class="content-list" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUser(3, user, 'searchActivated')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
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
                                <form id="usertranForm" class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" id="searchTrans" name="searchTrans" required ng-model="searchTrans" autocomplete="off" class="input-search" ng-keydown="findUserKeyDown($event, 0, 'searchTrans', 'N')" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                        <div class="content-list" id="list">
                                          <ul class="drop-list">
                                            <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
                                              Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
                                            </li>
                                            <li ng-repeat="user in top5users">
                                              <a ng-click="chooseUser(2, user, 'searchTrans')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
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
                                    <div  class="col-md-4">
                                      <div class="container">
                                        <div class="row" style="margin-top: -10px;">
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
                                        <script type="text/javascript">
                                          $(function () {
                                              $('#datetimepicker6').datetimepicker({
                                            format: "DD/MM/YYYY"
                                          });
                                              $('#datetimepicker7').datetimepicker({
                                                  useCurrent: false,
                                            format: "DD/MM/YYYY"
                                              });
                                              $("#datetimepicker6").on("dp.change", function (e) {
                                                  $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                              });
                                              $("#datetimepicker7").on("dp.change", function (e) {
                                                  $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                                              });
                                          
                                          });
                                      </script>
                                      </div>
                                    </div>
                                    <div  class="col-md-5">
                                      <input type="text" class="input-search AccountDetails" placeholder="Дансны нэр, Гүйлгээний утга, Харьцсан дансны нэр">
                                    </div>
                                    <div  class="col-md-3">
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
    <!--MODAL ENDS HERE-->
    <div id="loader" >
      <img src="{{asset('images/loader.gif')}}"/>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ligro.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular-route.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
<script type="text/javascript" src="{{asset('js/enscroll-0.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap2-toggle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/loadingoverlay.js')}}"></script>
    