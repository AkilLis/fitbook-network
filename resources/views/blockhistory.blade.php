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
              <ul class="timeline">
                @foreach ($blocks as $block)
                  <li class="timeline-inverted">
                    <div class="timeline-badge success" data-toggle="tooltip" data-placement="bottom" title="{{$block->created_at->diffForHumans()}}">
                      <i class="glyphicon glyphicon-thumbs-up"></i>
                    </div>
                    <div class="timeline-panel">
                      <div class="hexagon-panel" id="style-3">
                        <div style="min-width:957px">
                            @foreach ($block->members as $member)
                              <div class='hexagon-wrapper'>
                                  <div class='hexagon first-level'>
                                      <div class='hexagon-container'>
                                        <div class='hexagon-vertical-align'>
                                          <span class='hexagon-text' data-toggle="tooltip" data-placement="bottom" title="{{$member->parents->first()->userId}}">
                                            <h2>{{$member->pivot->fCount}}</h2>
                                            {{$member->userId}}
                                            </br>
                                            {{$member->pivot->created_at}}
                                          </span>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            @endforeach 
                          </div>
                      </div>
                    </div>
                  </li>
                @endforeach 
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /page content -->
@stop