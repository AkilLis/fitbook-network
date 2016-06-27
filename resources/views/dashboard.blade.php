@extends('layouts.master')
@section('content')
<!-- page content -->
      <script type="text/javascript">
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();   
          });
      </script>
  <div main-page>
    <div class="right_col" role="main">
      <!-- top tiles -->
      <div class="main-page">
        <!--Дансны мэдээлэл блок-->
        <div class="row tile_count">
          <div class="row x_title" style="margin-left:0px;;">
            <div class="col-md-12">
              <h3>Дансны мэдээлэл</h3>
            </div>
          </div>
          <div>
            <section>
              <div class="symbol red" ng-click="getAccountTransactions(3)">
                  <i class="fa fa-money count-icon"></i>
                  <p class="count">Бэлэн мөнгө</p>
                  <h1 class="count single-account">{{$accounts->cashEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol blue" ng-click="getAccountTransactions(5)">
                  <i class="fa fa-user count-icon"></i>
                  <p class="count">Хэрэглээ</p>
                  <h1 class="count single-account">{{$accounts->usageEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol yellow" ng-click="getAccountTransactions(1)">
                  <i class="fa fa-trophy count-icon"></i>
                  <p class="count">Шагнал</p>
                  
                  <h1 class="count single-account">{{$accounts->awardEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol terques" ng-click="getAccountTransactions(2)">
                  <i class="fa fa-graduation-cap count-icon"></i>
                  <p class="count">Урамшуулал</p>

                  @if(Auth::user()->isBoth())
                    <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Анхан">АН: </span><span class="amount">{{$accounts->bonusEnd}}₮</span></h1>
                    <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Ахьсан">АХ: </span><span class="amount">{{$accounts->bonusEnd}}₮</span></h1>
                  @else
                    <h1 class="count single-account">{{$accounts->bonusEnd}}₮</h1>          
                  @endif  
              </div>
            </section>
            <section>
              <div class="symbol purple" ng-click="getAccountTransactions(4)">
                  <i class="fa fa-hourglass-half count-icon"></i>
                  <p class="count">Хуримтлал</p>
                  
                  @if(Auth::user()->isBoth())
                    <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Анхан">АН: </span><span class="amount">{{$accounts->savingEnd}}₮</span></h1>
                    <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Ахьсан">АХ: </span><span class="amount">{{$accounts->savingEnd}}₮</span></h1>
                  @else
                    <h1 class="count single-account">{{$accounts->savingEnd}}₮</h1>          
                  @endif  
              </div>
            </section>
          </div>
        </div>
        <!-- Доод блокууд -->
        <div class="row">
          <div class="row x_title" style="margin-left:0px; margin-right:0px;">
            <div class="col-md-12">
              <h3>Анхан шат 
                <a class="glyphicon glyphicon-chevron-right" href="#" data-toggle="tooltip" data-placement="right" title="Ахисан шат руу шилжих" style="float: right; cursor: pointer;"></a>
              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
              <!--Блокийн мэдээлэл-->
              <div class="x_panel tile hex-height">
                <div class="row x_title">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                  <h3>Блокын мэдээлэл</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-sm-12" style="margin-bottom:10px;">
                    <LABEL style="float:left">{{$groupName}}</LABEL>
                    <label style="float:right; display:none" data-toggle="tooltip" data-placement="left" title="10 блок болсон тохиолдолд сүлжээний системийн эрх хасагдах болно">6 дахь блок</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-sm-12">
                  <div class="hexagon-panel" id="style-3">
                    <div style="min-width:957px">
                      <?php $counter = 0 ?>
                          @foreach ($block->members as $blockUser)
                            @if($blockUser->viewOrder == 1)
                              <div class='hexagon-wrapper'>
                                <div class='hexagon captain'>
                                  <div class='hexagon-container'>
                                    <div class='hexagon-vertical-align'>
                                      <span class='hexagon-text' data-toggle="tooltip" data-placement="bottom" title="">
                                        <h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}
                                        </br>{{$blockUser->created_at}}
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @else
                              <?php $counter++ ?>
                              @if($counter < 8)
                                <div class='hexagon-wrapper'>
                                  @if(Auth::user()->id == $blockUser->id)
                                  <div class='hexagon hex-own'>  
                                  @else
                                  <div class='hexagon first-level'>
                                  @endif
                                    <div class='hexagon-container'>
                                      <div class='hexagon-vertical-align'>
                                        <span class='hexagon-text' data-toggle="tooltip" data-placement="bottom" title=""><h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}</br>{{$blockUser->created_at}}</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @else
                                <div class='hexagon-wrapper'>
                                  @if(Auth::user()->id == $blockUser->id)
                                  <div class='hexagon hex-own'>  
                                  @else
                                  <div class='hexagon first-down-level'>
                                  @endif
                                    <div class='hexagon-container'>
                                      <div class='hexagon-vertical-align'>
                                        <span class='hexagon-text' data-toggle="tooltip" data-placement="bottom" title=""><h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}</br>{{$blockUser->created_at}}</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            @endif
                          @endforeach                        
                          @for($id = 1; $id < $emptyUsers; $id ++)
                          <div class='hexagon-wrapper'>
                            <div class='hexagon grey'>
                              <div class='hexagon-container' style="top: 0;">
                                <div class='hexagon-vertical-align'>
                                  @if($block->groupId == 1)
                                    <span class="hexagon-text hex-empty fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Зуучлах" ng-click="init('sponser')" data-toggle="modal" data-container="body">
                                    </span>
                                  @else
                                    <span class="hexagon-text hex-empty">
                                    </span>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          @endfor
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-12" style="display:none">
                  <div class="x_panel tile fixed_height_250">
                    <div class="row x_title">
                        <h3>Одоогийн авах урамшуулал</h3>  
                    </div>
                    <table width="100%" class="BonusTable">
                      <tr width="10%">
                        <th></th>
                        <th>Урамшуулал</th>
                        <th>Дүн</th>
                      </tr>
                      <tr width="10%" class="current-bonus bonus-list" data-toggle="tooltip" data-placement="left" title="Урамшуулал авсан" data-container="body">
                        <td valign="middle"><i class="fa fa-check"></i></td>
                        <td>Блокийн урамшуулал - 0 хүн</td>
                        <td>5 000₮</td>
                      </tr>
                      <tr width="45%" class="bonus-list" data-toggle="tooltip" data-placement="left" title="Авах боломжтой" data-container="body">
                        <td><i class="fa fa-hand-o-right"></i></td>
                        <td>Блокийн урамшуулал - 1 хүн</td>
                        <td>7 000₮</td>
                      </tr>
                      <tr width="45%" class="bonus-list">
                        <td></td>
                        <td>Блокийн урамшуулал - 2 хүн</td>
                        <td>14 000₮</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-12" style="display:none">
                  <div class="x_panel tile fixed_height_250">
                    <div class="row x_title">
                      <h3>Хэрэв ахлагч болвол</h3>  
                    </div>
                    <table width="100%" class="BonusTable">
                        <tr width="10%">
                          <th width="60%">Урамшуулал</th>
                          <th width="40%">Дүн</th>
                        </tr>
                        <tr class="bonus-list">
                          <td>Дэвших урамшуулал - Ахлагч</td>
                          <td>5 000 000₮</td>
                        </tr>
                        <tr class="bonus-list">
                          <td>Блокийн урамшуулал - Ахлагч</td>
                          <td>7 000₮</td>
                        </tr>
                        <tr class="bonus-list">
                          <td>Дэвших урамшуулал - Шат ахих</td>
                          <td>14 000₮</td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile" style="height:auto;">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>Манай баг</h3>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-sm-12">
                  <ol class="breadcrumb">
                    <li ng-class="bread.class" ng-repeat="bread in breadcrumb" ng-click="myTeam(bread.id)">
                      @{{bread.fName}}
                    </li>
                  </ol>
                  <div style="margin-bottom:10px">
                    <div style="margin-top:5px; float:left; font-weight: bold;">Миний зуучлагч:</div>
                    <div style="vertical-align:middle; font-size:11px; float:left; margin-left: 50px;">@{{parentInfo.fName}} @{{parentInfo.lName}}</br>@{{parentInfo.userId}}</div>
                  </div>
                  <div class="clearfix"></div>
                  <div><label style="margin-top:5px;">Манай багийн гишүүд:</label></div>
                    <div class="responsive-content">
                      <figure class="org-chart cf">
                        <div class="board ">
                          <ul class="columnOne">
                            <li>
                              <span class="lvl-b">
                               <strong>@{{userInfo.userId}}</strong>
                               <br>@{{userInfo.fName}} @{{userInfo.lName}}
                              </span>
                            </li>
                          </ul>
                        </div>
                        <ul class="departments deps-child3">
                          <div class="org-spacing org-sp-child3">
                            <li ng-repeat="child in childsInfo" class="department dep-child3">
                              <span class="lvl-b" ng-click="myTeam(child.id)">
                                <strong>@{{child.userId}}</strong>
                                <br>@{{child.lName}} @{{child.lName}}
                              </span>
                            </li>
                          </div>
                        </ul>
                      </figure>
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
@stop