angular.module('fitwork', []).controller('adminCtrl', function($scope, $http) {  
	
  $url = '/fitbook/public/ceo/admins';
  $scope.loadData = function () {
    $http.get($url).success(function(data) {
      $scope.users = data;
    });
  };

  $scope.detachAdmin = function(id, index){
	debugger;
	$http({
	  method: 'DELETE',
	  url: $url + '/' + id,
	}).then(function successCallback(response) {
		$scope.users.splice(index, 1);
	}, function errorCallback(response) {
	    
	});
  }

  $scope.attachAdmin = function(){
  	var formData = {
    	id : $( "#userId" ).val(),
    }
  	$http({
	  method: 'POST',
	  url: $url,
	  data: formData,
	}).then(function successCallback(response) {
	  $scope.users.push(response.data);
	}, function errorCallback(response) {
	    
	});
  }

  $scope.loadData();
});



