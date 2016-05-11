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
        <!--ДАнсны мэдээлэл блок-->
        <div class="row tile_count">
          <div class="row x_title" style="margin-left:0px; margin-right:0px;">
            <div class="col-md-12">
              <h3>Дансны мэдээлэл</h3>
            </div>
          </div>
          <div>
            <section>
              <div class="symbol red">
                  <i class="fa fa-money"></i>
                  <p class="count">Бэлэн мөнгө</p>
                  <h1 class="count single-account">{{$accounts->cashEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol blue">
                  <i class="fa fa-user"></i>
                  <p class="count">Хэрэглээ</p>
                  <h1 class="count single-account">{{$accounts->usageEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol yellow">
                  <i class="fa fa-trophy"></i>
                  <p class="count">Шагнал</p>
                  <h1 class="count single-account">{{$accounts->awardEnd}}₮</h1>
              </div>
            </section>
            <section>
              <div class="symbol terques">
                  <i class="fa fa-graduation-cap"></i>
                  <p class="count">Урамшуулал</p>
                  <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Анхан">АН: </span><span class="amount">{{$accounts->bonusEnd}}₮</span></h1>
                  <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Ахьсан">АХ: </span><span class="amount">{{$accounts->bonusEnd}}₮</span></h1>
              </div>
            </section>
            <section>
              <div class="symbol purple">
                  <i class="fa fa-hourglass-half"></i>
                  <p class="count">Хуримтлал</p>
                  <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Анхан">АН: </span><span class="amount">{{$accounts->savingEnd}}₮</span></h1>
                  <h1 class="count"><span class="counttit" data-toggle="tooltip" data-container="body" data-placement="left" title="Ахьсан">АХ: </span><span class="amount">{{$accounts->savingEnd}}₮</span></h1>
              </div>
            </section>
          </div>
        </div>
        <!-- Доод блокууд -->
        <div class="row">
          <div class="row x_title" style="margin-left:0px; margin-right:0px;">
            <div class="col-md-12">
              <h3>Анхан шат <a class="glyphicon glyphicon-chevron-right" href="#" data-toggle="tooltip" data-placement="right" title="Ахисан шат руу шилжих" style="float: right; cursor: pointer;"></a></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-12">
              <!--Блокийн мэдээлэл-->
              <div class="x_panel tile hex-height">
                <div class="row x_title">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                  <h3>Блокын мэдээлэл</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-sm-12" style="margin-bottom:10px;">
                    <LABEL style="float:left">2-р шат - Өсөх шат</LABEL>
                    <label style="float:right" data-toggle="tooltip" data-placement="left" title="10 блок болсон тохиолдолд сүлжээний системийн эрх хасагдах болно">6 дахь блок</label>
                  </div>
                  <div class="col-md-12 col-xs-12 col-sm-12" style="margin-left: -10px;">
                    <ul id="hexGrid">
                        <div>
                          <li class="hex">
                            <a class="hexIn">
                              <img src="{{asset('images/hex/yellow.png')}}" alt="" />
                              <div class="container-fluid" style="top: 30%;">
                                <div class="row-fluid">
                                    <div class="span3 centering text-center">
                                      <b style="font-size: 24px; margin-left: -15%; margin-top: -20%;">{{$capUser->fCount}}</b></br>{{$capUser->userId}}
                                    </div>
                                </div>
                              </div>
                            </a>
                          </li>
  <!--                         <div class="badge bg-hex-not hex-not">а</div> -->
                        </div>
                        <?php $counter = 0 ?>
                        @foreach ($blockUsers as $blockUser)
                          <?php $counter++ ?>
                          @if($counter < 7)
                            <li class="hex">
                            <a class="hexIn vertical class">
                              @if(Auth::user()->id == $blockUser->id)
                                <img src="{{asset('images/hex/purple.png')}}" alt="" />
                              @else
                                <img src="{{asset('images/hex/terques.png')}}" alt="" />
                              @endif  
                                <div class="container-fluid" style="top: 30%;">
                                  <div class="row-fluid">
                                      <div class="span3 centering text-center">
                                        <b style="font-size: 24px; margin-left: -15%; margin-top: -20%;">{{$blockUser->fCount}}</b></br>{{$blockUser->userId}}
                                      </div>
                                  </div>
                                </div>
                              </a>
                            </li>
                          @else
                            <li class="hex">
                            <a class="hexIn">
                              <img src="{{asset('images/hex/blue.png')}}" alt="" />
                                <div class="container-fluid" style="top: 30%;">
                                  <div class="row-fluid">
                                      <div class="span3 centering text-center">
                                        {{$blockUser->userId}}
                                      </div>
                                  </div>
                                </div>
                              </a>
                            </li>
                          @endif
                        @endforeach

                        @for($id = 1; $id < $emptyUsers; $id ++)
                        <li class="hex">
                          <a class="hexIn hex-empty" href="#MakeSponsor1" data-toggle="modal" data-tooltip="true" data-container="body" data-placement="bottom" title="Зуучлах">
                            <img src="http://localhost/fitbook/public/images/add.png" alt="" />
                          </a>
                        </li>
                        @endfor
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
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
                <div class="col-md-6 col-xs-6 col-sm-6">
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
            <div class="col-md-4 col-sm-12 col-xs-12">
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
        <!-- /page content --> 
        
@stop