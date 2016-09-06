app.controller('promCtrl', function($scope, $uibModal, $http, $log) { 

  	$isproduction = true;
    $baseUrl = $isproduction ? 'http://flexgym.mn/' : 'http://localhost/';
    $scope.users = {};

  	$scope.openModal = function(id) {
      $scope.$modalInstance = $uibModal.open({
          templateUrl: id + '.html',
          animation: true,
          size: 'sm',
          scope: $scope
      })
    }

    $scope.ok = function() {
        $scope.$modalInstance.close();
    };

    $scope.cancel = function() {
        $scope.$modalInstance.dismiss('cancel');
    };

    $scope.childs = function(id) {
        $http({
            method: 'GET',
            url: $baseUrl + 'promution/' + id,
            }).then(function successCallback(response) 
            {
              $scope.childsList = response.data.result;
              $scope.openModal('AddPromutionUser');
            }, function errorCallback(response) 
            {

            }
        ); 
    };
});
