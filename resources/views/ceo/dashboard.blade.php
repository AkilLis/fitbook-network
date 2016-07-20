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
                <div id="profit" class="row" style="padding-left: 10px;">
		            <div class="col-md-6">
					    <div class="panel panel-success tile panelClose panelRefresh">
					    	<div class="panel-heading">
	                            <h4 class="panel-title">Ашиг</h4>
	                        </div>
					        <div class="panel-body pt0">
					            <div class="progressbar-stats-1">
					                <div class="stats">
					                    <i class="l-basic-geolocalize-05"></i> 
					                    <div class="stats-number" data-from="0" data-to="2547">@{{profit}} 
					                    <label style="font-size:25px;">₮</label>
					                    </div>
					                </div>
					                <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
					                    <div class="progress-bar progress-bar-white" role="progressbar" data-transit86" style="width: 86%;"></div>
					                </div>
					                <div class="comparison">
					                    <p class="mb0"><i class="fa fa-arrow-circle-o-up s20 mr5 pull-left"></i>Сүүлийн сараас <label style="font-weight:bold;">2</label>% өссөн.</p>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					<div class="col-md-6">
					    <div class="panel panel-danger tile panelClose panelRefresh">
					    	<div class="panel-heading">
	                            <h4 class="panel-title">Зарлага</h4>
	                        </div>
					        <div class="panel-body pt0">
					            <div class="progressbar-stats-1">
					                <div class="stats">
					                    <i class="l-basic-geolocalize-05"></i> 
					                    <div class="stats-number" data-from="0" data-to="2547">@{{salary}}
					                    	<label style="font-size:25px;">₮</label>
					                    </div>
					                </div>
					                <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
					                    <div class="progress-bar progress-bar-white" role="progressbar" data-transit86" style="width: 86%;"></div>
					                </div>
					                <div class="comparison">
					                    <p class="mb0"><i class="fa fa-arrow-circle-o-up s20 mr5 pull-left"></i>Сүүлийн сараас <label style="font-weight:bold;">2</label>% өссөн.</p>
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
                    <h3>Хэрэглэгчийн бүртгэл хяналт</h3>
                  </div>
                </div>
                <div class="row">
	                <div class="col-md-6 col-sm-12">
	                	<div ng-repeat="group in user_group" class="row user-box">
	                		<div class="col-md-5" style="text-align:center;">
	                			<h3>@{{group.groupId | groupType}}</h3>
	                		</div>
	                		<div class="col-md-7" style="text-align:center;">
	                			<h3 class="color-red">@{{group.count}}</h3>
	                		</div>
                        </div>
	                </div>
	                <div class="col-md-6 col-sm-12" id="userChart">
	                </div>
	            </div>
              </div>
            </div>

            <div class="row">
                  <div class="col-md-6" style="background-color:white; text-align:center; border-radius: 4px; border: 1px solid #E6E9ED;">
                    <div class="last-header">
                    	<h3>Сүүлийн 20н цалин олголт</h3>	
                    </div>
                    <div class="last-body">
                    	<ul class="list-group recent-comments" ng-repeat="salary in salaryList">
                            <li class="list-group-item clearfix comment-success">
                                <p class="text-ellipsis"><span class="name strong">@{{salary.out_user.fName}}: </span> @{{salary.outAmt}} цалин олголт хийгдсэн.</p>
                                <span class="date text-muted small pull-left">@{{salary.invDate}}</span>
                                <span class="date text-muted small style="float:right;" ">Олгосон: @{{salary.in_user.fName}}</span>
                            </li>
                    	</ul>
                    </div>
                  </div>
                  <div class="col-md-6" style="background-color:white; text-align:center; border-radius: 4px; border: 1px solid #E6E9ED;">
                    <div class="last-header">
                    	<h3>Гишүүн элсүүлсэн</h3>	
                    </div>
                    <div class="last-body">
                    	<ul class="list-group recent-comments" ng-repeat="activity in activityList">
                            <li class="list-group-item clearfix comment-info">
                                <p class="text-ellipsis"><span class="name strong">@{{activity.in_user.fName}}</span> @{{activity.invType | accountType}} @{{activity.outAmt}} зарцуулсан.</p>
                                <span class="date text-muted small pull-left">@{{activity.invDate}}</span>
                                <span class="date text-muted small style="float:right;" ">Идэвхжүүлсэн: @{{activity.out_user.fName}}</span>
                            </li>
                    	</ul>
                    </div>
                  </div>
            </div>
	  	</div>		  	
	  </div>
	</div>
</div>
@stop