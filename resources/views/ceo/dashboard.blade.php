@extends('layouts.ceo-layout')
@section('content')
<div main-page>
    <div class="right_col" role="main">
      <div class="main-page">
	  	<div class="row tile_count">
	  		<div class="row x_title" style="margin-left:0px;">
          	</div>
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>Ашиг, зарлагын хяналт</h3>
                  </div>
                </div>
                <div id="profit" class="row">
		            <div class="col-ls-12 col-md-4 col-sm-4 col-xs-12">
					    <div class="panel panel-success tile panelClose panelRefresh col-md-12" style="width:100%; min-width:220px;">
					    	<div class="panel-heading">
	                            <h4 class="panel-title" style="padding-top:15px; font-size: 20px;">Ашиг</h4>
	                        </div>
					        <div class="panel-body pt0">
					            <div class="progressbar-stats-1">
					                <div class="stats">
					                    <i class="l-basic-geolocalize-05"></i> 
					                    <div class="stats-number" data-from="0" data-to="2547">
					                    <div style="font-size:30px;">@{{profit}}₮</div>
					                    <!-- <span style="font-size:20px;"></span> -->
					                    </div>
					                </div>
					                <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
					                    <div class="progress-bar progress-bar-white" role="progressbar" data-transit86" style="width: 86%;"></div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					<div class="col-ls-12 col-md-4 col-sm-4 col-xs-12">
					    <div class="panel panel-danger tile panelClose panelRefresh col-md-12" style="width:100%; min-width:220px;">
					    	<div class="panel-heading">
	                            <h4 class="panel-title" style="padding-top:15px; font-size: 20px;">Зарлага</h4>
	                        </div>
					        <div class="panel-body pt0">
					            <div class="progressbar-stats-1">
					                <div class="stats">
					                    <i class="l-basic-geolocalize-05"></i> 
					                    <div class="stats-number" data-from="0" data-to="2547">
					                    	<div style="font-size:30px;">@{{salary}}₮</div>
					                    </div>
					                </div>
					                <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
					                    <div class="progress-bar progress-bar-white" role="progressbar" data-transit86" style="width: 86%;"></div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					<div class="col-ls-12 col-md-4 col-sm-4 col-xs-12">
					    <div class="panel panel-warning tile panelClose panelRefresh col-md-12" style="width:100%; min-width:220px;" ng-click="getEndSalary()">
					    	<div class="panel-heading">
	                            <h4 class="panel-title" style="padding-top:15px; font-size: 20px;">Цалингийн үлдэгдэл</h4>
	                        </div>
					        <div class="panel-body pt0">
					            <div class="progressbar-stats-1">
					                <div class="stats">
					                    <i class="l-basic-geolocalize-05"></i> 
					                    <div class="stats-number" data-from="0" data-to="2547">
					                    	<div style="font-size:30px;">@{{endSalary}}₮</div>
					                    </div>
					                </div>
					                <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
					                    <div class="progress-bar progress-bar-white" role="progressbar" data-transit86" style="width: 86%;"></div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
	            </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3 style="float:left;">Дэлгэрэнгүй</h3>
                    <select style="float:right; width:90px;" class="filter-combo" ng-model="profitType" ng-change="getProfitDetailed()">
                          <option value="Year" >Жил</option>
                          <option value="Month" selected>Сар</option>
                          <option value="Day">Өдөр</option>
                    </select> 
                  </div>
                </div>
                <div id="profitChart" class="row">
	            </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>Хэрэглэгчийн хяналт</h3>
                  </div>
                </div>
	                <div style="height:200px; width:100%">
	                	<div ng-repeat="group in user_group" class="row user-box">
	                			<h3 style="float:left">@{{group.groupId | groupType}}</h3>
	                			<h3 style="float:right">
	                				<a ng-click="getUserGroupDetail(group.groupId)" class="groupCount @{{group.groupId | groupColor}}">@{{group.count}}</a>
	                			</h3>
                        </div>
	                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3 style="float:left;">Хэрэглэгчийн бүртгэл хяналт</h3>
                    <select style="float:right; width:90px;" class="filter-combo" ng-model="dateType" ng-change="getUserRegistration()">
                          <option value="Year" >Жил</option>
                          <option value="Month" selected>Сар</option>
                          <option value="Day">Өдөр</option>
                    </select> 
                  </div>
                </div>
                <div class="row">
	                <div class="col-md-12 col-sm-12">
	                	<div id="container" style="min-width: 310px; height: 200px; margin: 0 auto">
	                		
	                	</div>
	                </div>
	            </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>Цалин олголт</h3>
                  </div>
                </div>
                <div class="row" style="overflow-y:auto; height:285px; overflow-x: hidden;">
	                <div class="col-md-12 col-sm-12">
	                	<ul class="list-group recent-comments" ng-repeat="salary in salaryList">
                            <li class="list-group-item clearfix comment-success">
                                <p class="text-ellipsis"><span class="name strong">@{{salary.out_user.fName}}: </span> @{{salary.outAmt}} цалин олголт хийгдсэн.</p>
                                <span class="date text-muted small pull-left">@{{salary.invDate}}</span>
                                <span class="date text-muted small" style="float:right;">Олгосон: @{{salary.in_user.fName}}</span>
                            </li>
                    	</ul>
	                </div>
	            </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>Гишүүн элсүүлсэн</h3>
                  </div>
                </div>
                <div class="row" style="overflow-y:auto; height:285px; overflow-x: hidden;">
	                <div class="col-md-12 col-sm-12">
	                	<ul class="list-group recent-comments" ng-repeat="activity in activityList" >
                            <li class="list-group-item clearfix comment-info">
                                <p class="text-ellipsis"><span class="name strong">@{{activity.in_user.fName}}</span> @{{activity.invType | accountType}} @{{activity.outAmt}} зарцуулсан.</p>
                                <span class="date text-muted small pull-left">@{{activity.invDate}}</span>
                                <span class="date text-muted small" style="float:right;">Идэвхжүүлсэн: @{{activity.out_user.fName}}</span>
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
@stop