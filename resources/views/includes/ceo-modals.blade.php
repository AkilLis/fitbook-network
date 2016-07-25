<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ligro.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular-route.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ui-bootstrap-tpls-1.3.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('app/app.js')}}"></script>
<script type="text/javascript" src="{{asset('app/controller/usercontroller.js')}}"></script>
<script type="text/javascript" src="{{asset('app/controller/ceocontroller.js')}}"></script>
<script type="text/javascript" src="{{asset('app/filter/customType.js')}}"></script>
<script type="text/javascript" src="{{asset('js/highcharts.js')}}"></script>


<script type="text/ng-template" id="usergroupdetail.html">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Хэрэглэгчид</h4>
        </div>
        <div class="modal-body" style="width:100%">
            <form class="reg-modal form-group">
                    <div class="centered" style="width:95%; height:300px; overflow-y:scroll;">
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                          <th align="center">Нэр</th>
                          <th align="center"></th>
                        </tr>
                      </thead>  
                      <tbody id="tasks-list" name="tasks-list">
                        <tr ng-repeat="group in user_group_detail">
                          <td>@{{group.fName}}</td>
                          <td>@{{group.userCount}}</td>
                        </tr>
                      </tbody> 
                    </table>
                  </div>
            </form>
        </div>
    </div>
</script>

<script type="text/ng-template" id="userregistrationdetail.html">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Хэрэглэгчид</h4>
        </div>
        <div class="modal-body" style="width:100%">
            <form class="reg-modal form-group">
                    <div class="centered" style="width:95%; height:300px; overflow-y:scroll;">
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
                      <thead>
                        <tr>
                          <th align="center">Нэр</th>
                          <th align="center">Огноо</th>
                        </tr>
                      </thead>  
                      <tbody id="tasks-list" name="tasks-list">
                        <tr ng-repeat="group in user_registration_detail">
                          <td>@{{group.fName}}</td>
                          <td>@{{group.created_at}}</td>
                        </tr>
                      </tbody> 
                    </table>
                  </div>
            </form>
        </div>
    </div>
</script>