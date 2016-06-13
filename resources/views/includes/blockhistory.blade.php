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
                <li>
                  <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                      <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                      <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                      <hr>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                          <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                    </div>
                  </div>
                </li>
              </ul>
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
                              <span class='hexagon-text'><h2>{{$capUser->fCount}}</h2>{{$capUser->userId}}</br>{{$capUser->created_at}}</span>
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
                                      <span class='hexagon-text'><h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}</br>{{$blockUser->created_at}}</span>
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
                                      <span class='hexagon-text'><h2>{{$blockUser->fCount}}</h2>{{$blockUser->userId}}</br>{{$blockUser->created_at}}</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /page content -->
@stop