var app = angular.module("fitwork", []);

app.controller('mainCtrl', function($scope, $http) { 
  $userUrl = '/fitbook/public/admin/users';
  $adminUrl = '/fitbook/public/ceo/admins'; 

  $scope.loadData = function () {
    $http.get($adminUrl).success(function(data) {
      $scope.users = data;
    });
  };

  $scope.detachAdmin = function(id, index){
	$http({
	  method: 'DELETE',
	  url: $adminUrl + '/' + id,
	}).then(function successCallback(response) {
		$scope.users.splice(index, 1);
	}, function errorCallback(response) {
	    
	});
  }

  $scope.attachAdmin = function(){
  	var formData = {
    	id : $( "#searchAdmin" ).val(),
    }
  	$http({
	  method: 'POST',
	  url: $adminUrl,
	  data: formData,
	}).then(function successCallback(response) {
	  $scope.users.push(response.data);
	}, function errorCallback(response) {
	    
	});
  }

  $scope.chooseUser = function(index, currentUser, id){
  	$(".content-list:eq("+index+")").hide()
  	$("#"+id+"").val(currentUser.userId);
  };

  $scope.loadData();
  $scope.findUser = function(value, index){
		var formData = {
	    	search : value,
	    }
	    $http({
		  method: 'POST',
		  url: 'get/users',
		  data: formData,
		}).then(function successCallback(response) {
		  	console.log(response);
		  	debugger;
		  	if(response.data.gotinfo == "failed")
		  	{
		  		$(".content-list:eq("+index+")").hide();
		  	}
		  	else
		  	{
		  		$scope.top5users = response.data.users;
		  		$(".content-list:eq("+index+")").fadeIn("fast");   
		  	}
		}, function errorCallback(response) {

		});
  };

  $scope.$watch('searchValue', function(newValue) {
    if (newValue){
	    $scope.findUser(newValue, 0);
    }
    else $('.content-list:eq(0)').hide();
  });

  $scope.$watch('searchAdmin', function(newValue) {
    if (newValue){
	    $scope.findUser(newValue, 1);
    }
    else $('.content-list:eq(1)').hide();
  });
});



