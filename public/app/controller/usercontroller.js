app.controller('userCtrl', ['$scope','$http', function($scope, $http) {
  	$isproduction = false;
    $baseUrl = $isproduction ? 'http://103.17.108.49/' : 'http://localhost/fitbook/public/';
    $scope.notifications = {};

    $scope.getNotification = function () {
	    $http({
	    method: 'GET',
	    url: $baseUrl + 'notification',
	    }).then(function successCallback(response) {
	      $scope.notifications = response.data.data;
	    }, function errorCallback(response) {
	    });     
  	}

  	$scope.markAsRead = function(id, userId) {
  		debugger;
  	}

  	$scope.getNotification();
}]);