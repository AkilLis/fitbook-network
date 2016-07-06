app.directive('postsPagination', function(){  
   return{
      restrict: 'E',
      template: '<ul class="pagination pagination-sm">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getAccountByType(1)">&laquo;</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getAccountByType(currentPage-1)">&lsaquo; Өмнөх</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getAccountByType(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getAccountByType(currentPage+1)">Дараах &rsaquo;</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getAccountByType(totalPages)">&raquo;</a></li>'+
      '</ul>'
   };
});

app.directive('topUsers', function(){  
   return{
      restrict: 'E',
      template: '<div class="content-list" id="list">'+
        '<ul class="drop-list">'+
        '<li style="padding:5px; background: #F1F1F1; color:#9197A3" class="user-profile dropdown-toggle">'+
        'Хайлтын илэрц <i class="fa fa-search" style="float: right; padding: 2px;"></i>'+
        '</li>'+
        '<li ng-repeat="user in top5users">'+
        '<a ng-click="chooseUser(user, \''+'N'+'\')" style="padding:5px" class="user-profile dropdown-toggle " data-toggle="dropdown">'+
        '<div style="vertical-align:middle; font-size:11px;">{{user.lName + " " + user.fName}}</br>{{user.userId}}</div>'+
      '</a>' + 
      '</li></ul></div>'
   };
});


                                          
                                            
                                              
                                            
                                            
                                              
                                                
                                              
                                            
                                          
                                        