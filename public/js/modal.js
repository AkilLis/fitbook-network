var app = angular.module("fitwork", []);

app.controller('mainCtrl', function($scope, $http) { 
  $userUrl = '/fitbook/public/admin/users';
  $adminUrl = '/fitbook/public/ceo/admins'; 
  $userAuth = '/fitbook/public/auth/activate';

  $scope.displayNotification = function(type, text)
  {
      $.notify({
        title : 'Амжилттай',
        message : text,
        type : 'success',
        animate : {
          enter : 'animated bounceIn',
          exit : 'animated fadeOutRight'
        },
        newest_on_top: true,
        offset :{
          x:20,
          y:20
        }
      }); 
  }

  $scope.loadData = function () {
    $http.get($adminUrl).success(function(data) {
      $scope.users = data;
    });
  };

  $scope.activateUser = function()
  {
    $('#loader').fadeIn(1000);

  	var formData = {
    	id : $( "#searchActivated" ).val(),
    	parentId : $( "#searchSponser" ).val(),
    }

  	$http({
	  method: 'POST',
	  url: $userAuth,
	  data: formData,

	  }).then(function successCallback(response) {
		  
      $('#MakeSponsor1').modal('hide');
      $('#loader').fadeOut(1);

	}, function errorCallback(response) {

	    $('#loader').fadeOut(1);
	});	
  }

  $scope.detachAdmin = function(id, index){
	$http({
	  method: 'DELETE',
	  url: $adminUrl + '/' + id,
	}).then(function successCallback(response) {
		$scope.users.splice(index, 1);
    $scope.displayNotification(1 , 'Эрх хаслаа');
	}, function errorCallback(response) {
	    
	});
  }

  $scope.attachAdmin = function(){
  	var formData = {
    	userId : $( "#searchAdmin" ).val(),
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
  	$("#"+id+"").focus();
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

  $scope.$watch('searchSponser', function(newValue) {
    if (newValue){
	    $scope.findUser(newValue, 2);
    }
    else $('.content-list:eq(2)').hide();
  });

  $scope.$watch('searchActivated', function(newValue) {
    if (newValue){
	    $scope.findUser(newValue, 3);
    }
    else $('.content-list:eq(3)').hide();
  });
});



