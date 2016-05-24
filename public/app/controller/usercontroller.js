app.controller('userCtrl', ['$scope','$http', function($scope, $http) {
  	$isproduction = false;
    $baseUrl = $isproduction ? 'http://103.17.108.49/' : 'http://localhost/fitbook/public/';
    $scope.notifications = {};
    $scope.totalCount = 0;

    $scope.getNotification = function () {
	    $http({
	    method: 'GET',
	    url: $baseUrl + 'notification',
	    }).then(function successCallback(response) {
	      $scope.notifications = response.data.notifications.data;
	      $scope.totalCount = response.data.totalCount[0].totalCount;
	    }, function errorCallback(response) {
	    });     
  	}

  	$scope.markAsRead = function(id, userId) {
  	}

  	$scope.getNotification();
}]);