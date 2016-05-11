var app = angular.module("fitwork", []);

app.controller('mainCtrl', function($scope, $http) { 
  $userUrl = '/fitbook/public/admin/users';
  $adminUrl = '/fitbook/public/ceo/admins'; 
  $userAuth = '/fitbook/public/auth/activate';
  $loadUserCashUrl = '/fitbook/public/get/account';

  $addAmount = 0;

  $scope.displayNotification = function(type, text) {
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

  //INIT METHOD
  $scope.initLoadCash = function(){
    $('#searchMoney').focus();
    $('#add-money-form').trigger("reset");
    $scope.addAmount = 0;
    $scope.endAmount = 0;
    $scope.total();
  };

  $scope.getAllAdmins = function (){
    $('#searchAdmin').focus();
    $http.get($adminUrl).success(function(data) {
      $scope.users = data;
    });
  }

  $scope.getAllAdmins();

  //ХЭРЭГЛЭГЧИЙН БЭЛЭН МӨНГӨНИЙ ДАНСЫГ ЦЭНЭГЛЭХ
  $scope.loadUserCash = function () {
    var formData = {
      amount : $scope.total(),
    }

    $http({
    method: 'PUT',
    url: $loadUserCashUrl + '/' + $('#searchMoney').val(),
    data: formData,

    }).then(function successCallback(response) {
      $('#addMoneyfromCEO').modal('hide');
      $scope.displayNotification(0, 'Цэнэглэлээ');   
    }, function errorCallback(response) {
      $scope.displayNotification(0, 'цэнэглэх явцад алдаа гарлаа');
    });     
  }

  //ХЭРЭГЛЭГЧТЭЙ ХОЛБООТОЙ ЛОЖИК

  $scope.activateUser = function(){
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

  $scope.findUserKeyDown = function(event, index, id, withAccount){
    if(event.which == 13 && $scope.top5users.length == 1)
    {
      $scope.chooseUser(index, null, id, withAccount);
    }
  };

  $scope.chooseUser = function(index, currentUser, id, withAccount){
  	$(".content-list").hide()
  	$("#"+id+"").val(currentUser == null ? $scope.top5users[0].userId : currentUser.userId);
  	$("#"+id+"").focus();

    if(withAccount == 'Y')
    {
      debugger;
      var formData = {
        id : currentUser == null ? $scope.top5users[0].id : currentUser.id,
      }
      $http({
        method: 'POST',
        url: 'get/account',
        data: formData,
      }).then(function successCallback(response) {
        debugger;
          $scope.endAmount = response.data.endAmount;
      }, function errorCallback(response) {

      });
    }
  };
 
  $scope.total = function (){
      return parseInt($scope.endAmount) + parseInt($scope.addAmount == null ? 0 : $scope.addAmount);
  };

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
          if($scope.top5users.length != 1)
            $scope.endAmount = 0;
		  		$(".content-list:eq("+index+")").fadeIn("fast");   
		  	}
		}, function errorCallback(response) {

		});
  };

  $scope.$watch('searchMoney', function(newValue) {
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



