app.controller('cashCtrl', ['$scope','$http', function($scope, $http) {
  	$isproduction = true;
    $baseUrl = $isproduction ? 'http://flexgym.mn/' : 'http://192.168.1.6/';
    $scope.transactions = {};
    $scope.cashType = "All";
    $scope.search = "";

    $scope.getCash = function () {
	    $http({
	    method: 'GET',
	    url: $baseUrl + 'api/cash/' + $scope.cashType + '?search=' + $scope.search,
	    }).then(function successCallback(response) {
	       $scope.transactions = response.data;
	    }, function errorCallback(response) {
	       
      });     
  	}

  	$scope.selectChanged = function() {
  		$scope.getCash();
	}

  	$scope.getCash();
}]);
