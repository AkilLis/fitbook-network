@extends('layouts.promution-layout')
@section('content')

  <div class="container main-page" 
       style="background-color:#fff; border-radius:4px; margin-top:10px; padding:20px;">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Хэрэглэгч урих</h1>

<!-- if there are creation errors, they will show here -->
  
    <form method="POST" action="/promution">
      {{ csrf_field() }}

      <div class="form-group">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
              <label>Овог</label>
            </div>
            <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
              <input name="lname" value="{{ old('lname') }}" class="input-default" type="text" style="width:100%"/>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
              <label>Нэр</label>
            </div>
            <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
              <input name="fname" value="{{ old('fname') }}" class="input-default" type="text" style="width:100%"/>
              {{-- <span ng-show="myForm.fName.$invalid">Нэр оруулна уу.</span> --}}
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
              <label>Регистрийн №</label>
            </div>
            <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
              <input name="registryNo" value="{{ old('registryNo') }}" class="input-default" type="text" style="width:100%"/>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
              <label>Утасны дугаар</label>
            </div>
            <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
              <input name="phone" value="{{ old('phone') }}" class="input-default" type="number" style="width:100%"/>
            </div>

            <div class="clearfix"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vertical-centered-label">
              <label>Урьсан хүн</label>
            </div>
            <div class="col-md-8 col-md-8 col-sm-12 col-xs-12">
               <input id="parent" name="parent" class="typeahead input-default" type="text" autocomplete="off" placeholder="хайх ...">
            </div>
            <div class="clearfix"></div>
        </div>

        <button class="btn btn-success">Хадгалах</button>
        <a href="/promution" class="btn btn-success">Буцах</a>
      </div>
    </form> 
  </div>

  <script type="text/javascript">
    $( document ).ready(function() {
        $("#parent").on("keyup", function() {
            $('.typeahead').typeahead({
                highlighter: function (item) {
                        debugger;
                        var parts = item.split('#'),
                            html = '<div class="typeahead">';
                        html += '<div class="pull-left margin-small">';
                        html += '<div class="text-left"><strong>Регистр : ' + parts[0] + '</strong></div>';
                        html += '<div class="text-left">' + parts[1] + ' - '+ parts[2] +'</div>';
                        html += '</div>';
                        html += '<div class="clearfix"></div>';
                        html += '</div>';
                        return html;
                },
                updater: function (item) {
                    var parts = item.split('#');
                    return parts[0];
                },
                source: function (query, process) {
                    

                    return $.get('/promution/search', { search: query }, function (data) {
                        debugger;
                        var list = [];
                        // Loop through and push to the array
                        $.each(data.result, function (i, e) {
                            list.push(e.registryNo + "#" + e.fName + "#" + e.lName);
                        });

                        return process(list);
                    });
                }
            });
        });
    });
  </script>
@stop
