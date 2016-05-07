@extends('layouts.master')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-12 col-xs-12 col-sm-12">
              <div class="x_panel tile">
                <div class="row x_title">
                  <div class="col-md-12">
                  <h3>Дансний мэдээлэл</h3>
                  </div>
                </div>
                  <a class="col-md-2 col-md-offset-1 tile_stats_count col-sm-4 col-centered col-xs-12" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-money"></i> Бэлэн мөнгө</span>
                    <div class="count">123 ₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count col-sm-4 col-centered col-xs-12" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Урамшуулал</span>
                    <div class="count">123 ₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count col-sm-4 col-centered col-xs-12" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-trophy"></i> Шагнал</span>
                    <div class="count">123 ₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count col-sm-6 col-centered col-xs-12" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-user"></i> Хэрэглээ</span>
                    <div class="count">123 ₮</div>
                  </a>
                  <a class="col-md-2 tile_stats_count col-sm-6 col-centered col-xs-12" data-toggle="modal" href="#AccountDetail">
                    <span class="count_top"><i class="fa fa-hourglass-half"></i> Хуримтлал</span>
                    <div class="count">123 ₮</div>
                  </a>
               </div>
            </div>
          </div>
          <!-- /top tiles -->
        <div class="row">
          <div class="col-md-8 col-xs-12 col-sm-12">
            <div class="x_panel tile fixed_height_450">
              <div class="row x_title">
                <div class="col-md-12 col-xs-12 col-sm-12">
                <h3>Блокын мэдээлэл</h3>  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                  <ul id="hexGrid">
                    <div>
                      <li class="hex">
                        <a class="hexIn" href="#">
                          <img src="{{asset('images/user.png')}}" alt="" />
                          <h1>This is a title</h1>
                          <p>Some sample text about the article this hexagon leads to</p>
                        </a>
                      </li>
                      <div class="badge bg-hex-not hex-not">А</div>
                    </div>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="{{asset('images/picture.jpg')}}" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                    <li class="hex">
                      <a class="hexIn" href="#">
                        <img src="http://localhost/fitbook/public/images/user.png" alt="" />
                        <h1>This is a title</h1>
                        <p>Some sample text about the article this hexagon leads to</p>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
             </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_450">
              <div class="row x_title">
                <div class="col-md-12">
                <h3>Манай баг</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-centered">
                  <div class="tree">
                    <ul>
                    <li>
                      <a href="#">Parent</a>
                      <ul>
                      <li>
                        <a href="#">Child</a>
                        <ul>
                        <li><a href="#">Grand Child</a></li>
                        <li>
                          <a href="#">Grand Child</a>
                        </li>
                        <li><a href="#">Grand Child</a></li>
                        <li><a href="#">Grand Child</a></li> 
                        </ul>
                      </li>
                      </ul>
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
            </div>
          </div>
        <!-- /page content -->   
@stop