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
          <div data-toggle="modal" href="#AccountDetail">
            <section>
              <div class="symbol red">
                  <i class="fa fa-money count-icon"></i>
                  <p class="count">Бэлэн мөнгө</p>
                  <h1 class="count single-account">{{$accounts->cashEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol blue">
                  <i class="fa fa-user count-icon"></i>
                  <p class="count">Хэрэглээ</p>
                  <h1 class="count single-account">{{$accounts->usageEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol yellow">
                  <i class="fa fa-trophy count-icon"></i>
                  <p class="count">Шагнал</p>
                  
                  <h1 class="count single-account">{{$accounts->awardEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol terques">
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
              <div class="symbol purple">
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
                    <label style="float:right" data-toggle="tooltip" data-placement="left" title="10 блок болсон тохиолдолд сүлжээний системийн эрх хасагдах болно">6 дахь блок</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-sm-12" style="margin-left: -10px; margin-bottom: 50px">
                    <div>
                      <div class='hexagon-wrapper'>
                        <div class='hexagon captain'>
                          <div class='hexagon-container'>
                            <div class='hexagon-vertical-align'>
                              <span class='hexagon-text'><h2>{{$capUser->fCount}}</h2>{{$capUser->userId}}</br>16:50:23:00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $counter = 0 ?>
                          @foreach ($blockUsers as $blockUser)
                            <?php $counter++ ?>
                            @if($counter < 7)
                              <div class='hexagon-wrapper'>
                                @if(Auth::user()->id == $blockUser->id)
                                <div class='hexagon hex-own'>  
                                @else
                                <div class='hexagon first-level'>
                                @endif
                                  <div class='hexagon-container'>
                                    <div class='hexagon-vertical-align'>
                                      <span class='hexagon-text'><h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}</br>16:08:14:30:30</span>
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
                                      <span class='hexagon-text'><h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}</br>16:50:23:00</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endif
                          @endforeach                        
                          @for($id = 1; $id < $emptyUsers; $id ++)
                          <div class='hexagon-wrapper'>
                            <div class='hexagon grey' data-toggle="tooltip" data-placement="bottom" title="Зуучлах">
                              <div class='hexagon-container' style="top: 0;">
                                <div class='hexagon-vertical-align'>
                                  <span class="hexagon-text hex-empty fa fa-plus" ng-click="init('sponser')"  data-toggle="modal" data-container="body">
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endfor
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-12">
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
                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-12">
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
              <div class="x_panel tile" style="height:525px">
                <div class="row x_title">
                <div class="col-md-12">
                  <h3>Манай баг</h3>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-sm-12">
                  <ol class="breadcrumb">
                    <li><a href="#">Хулангоо</a></li>
                    <li><a href="#">Түвшинбат</a></li>
                    <li class="active">Пүүжээ</li>
                  </ol>
                  <div class="row" style="margin-bottom:10px">
                    <div class="col-md-6"><label style="margin-top:5px">Миний зуучлагч:</label></div>
                      <div>
                        <span class="lvl-b user-profile">
                          <div class="col-md-6" style="vertical-align:middle; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                        </span>
                      </div>
                    </div>
                    <div><label style="margin-top:5px;">Манай багийн гишүүд:</label></div>
                    <div class="responsive-content">
                      <figure class="org-chart cf">
                        <div class="board ">
                          <ul class="columnOne ">
                            <li>
                              <span class="lvl-b user-profile own-class">
                                <div class="row">
                                  <div class="col-md-12" style="vertical-align:middle; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                </div>
                              </span>
                            </li>
                          </ul>
                        </div>
                        <ul class="departments ">
                          <li class="department scrolldiv" id="style-3" style="height:265px; padding-bottom:30px;">
                            <div id="mask" style="border-top:1px solid #5A738E;">
                            <ul class="sections">
                              <li class="section"> 
                                <span class="user-profile" data-toggle="tooltip" data-placement="left" title="2-р шат - Ахлагч" data-container="body">
                                  <div class="row">
                                    <div class="col-md-2 vertical-class">
                                      <div class="vetical-content org-chart-content org-blue"><p>2</p></div>
                                    </div>
                                    <div class="col-md-10" style="float:left; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                  </div>
                                </span>
                              </li>
                              <li class="section"> 
                                <span class="user-profile" data-toggle="tooltip" data-placement="left" title="3-р шат - Ахлагч" data-container="body">
                                  <div class="row">
                                    <div class="col-md-2 vertical-class">
                                      <div class="vetical-content org-chart-content org-tesquer"><p>3</p></div>
                                    </div>
                                    <div class="col-md-10" style="float:left; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                  </div>
                                </span>
                              </li>
                              <li class="section"> 
                                <span class="user-profile" data-toggle="tooltip" data-placement="left" title="Лидер" data-container="body">
                                  <div class="row">
                                    <div class="col-md-2 vertical-class">
                                      <div class="vetical-content org-chart-content org-yellow"><p>Л</p></div>
                                    </div>
                                    <div class="col-md-10" style="float:left; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                  </div>
                                </span>
                              </li>
                              <li class="section"> 
                                <span class="user-profile" data-toggle="tooltip" data-placement="left" title="1-р шат - Ахлагч" data-container="body">
                                  <div class="row">
                                    <div class="col-md-2 vertical-class">
                                      <div class="vetical-content org-chart-content org-grey"><p>1</p></div>
                                    </div>
                                    <div class="col-md-10" style="float:left; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                  </div>
                                </span>
                              </li>
                              <li class="section"> 
                                <span class="user-profile" data-toggle="tooltip" data-placement="left" title="1-р шат - Ахлагч" data-container="body">
                                  <div class="row">
                                    <div class="col-md-2 vertical-class">
                                      <div class="vetical-content org-chart-content org-grey"><p>1</p></div>
                                    </div>
                                    <div class="col-md-10" style="float:left; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                  </div>
                                </span>
                              </li>
                              <li class="section"> 
                                <span class="user-profile" data-toggle="tooltip" data-placement="left" title="1-р шат - Ахлагч" data-container="body">
                                  <div class="row">
                                    <div class="col-md-2 vertical-class">
                                      <div class="vetical-content org-chart-content org-grey"><p>1</p></div>
                                    </div>
                                    <div class="col-md-10" style="float:left; font-size:11px;">Түвшинбат Гансүх</br>ID00000001</div>
                                  </div>
                                </span>
                              </li>
                            </ul>
                            </div>
                          </li>
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