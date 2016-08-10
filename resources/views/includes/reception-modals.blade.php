<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ligro.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular-route.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ui-bootstrap-tpls-1.3.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('app/app.js')}}"></script>
<script type="text/javascript" src="{{asset('app/controller/usercontroller.js')}}"></script>
<script type="text/javascript" src="{{asset('app/directive/custom-directive.js')}}"></script>
<script type="text/javascript" src="{{asset('app/filter/customType.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-notify.min.js')}}"></script>

<div ng-controller="userCtrl">

<div class="modal fade" id="usageaccount" tabindex="-1" role="dialog" aria-labelledby="usageaccount" aria-hidden="true" data-target="usageaccount">
   <div class="modal-dialog">
     <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Мөнгө оруулах</h4>
          </div>
          <div class="modal-body">
            <form name="receptionModal" id="receptionModal" class="reg-modal form-group">
              <div class="row">
                <div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                    <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                    <input type="text" ng-keydown="findUserKeyDown($event, 'N')" class="input-default search-input wrap" id="usageUser" ng-model="userUsage" style="width: 100%" autocomplete="off">
                    <div class="content-list" id="list">
				        <ul class="drop-list">
				        <li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">
				        Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>
				        </li>
				        <li ng-repeat="user in users">
				        <a ng-click="checkUsageEnd(user)" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">
				        <div style="vertical-align:middle; font-size:11px;">@{{user.lName + " " + user.fName}}</br>@{{user.userId}}</div>
				      </a>
				      </li></ul>
				    </div>
                  </div>
                </div>
                <div class="clearfix"></div>    
                <div>
                  <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 vertical-centered-label">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                      <thead>
                      
                        <tr>
                          <th width="40%">Данс</th>
                          <th width="30%">Дансан дахь үлдэгдэл</th>
                          <th width="30%">Мөнгөн дүн</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Хэрэглээний</td>
                          <td>@{{usageEndAmount | currency : ""}}₮</td>
                          <td>
                            <input id="usageAmt" class="borderless-input" type="text" />
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-green" ng-click="loadGym()"><i class="fa fa-save"></i> Хадгалах</button>
          </div>
        </div>
    </div>
</div>
</div>