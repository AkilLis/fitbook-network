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