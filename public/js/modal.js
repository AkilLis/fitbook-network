var app = angular.module("fitwork", []);

app.controller('mainCtrl', function($scope, $http) { 
  $userUrl = 'http://localhost/fitbook/public/admin/users';
  $adminUrl = 'http://localhost/fitbook/public/ceo/admins'; 
  $userAuth = 'http://localhost/fitbook/public/auth/activate';
  $loadUserCashUrl = 'http://localhost/fitbook/public/get/account';
  $makeTranUrl = 'http://localhost/fitbook/public/transaction'
  $rootUrl = 'http://localhost/fitbook/public/';
  $scope.bonusAmount = 0;
  $rank = 1;

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

  $scope.init = function(){
    $('#add-money-form').trigger("reset");
    $scope.addAmount = 0;
    $(".reg-modal").trigger("reset");
    $scope.endAmount = 0;
    $scope.shAwardAmount = 0;
    $scope.shBonusAmountBg = 0;
    $scope.shBonusAmountAd = 0;

    $scope.edAwardAmount = 0;
    $scope.edBonusAmountBg = 0;
    $scope.edBonusAmountAd = 0;
    $scope.total();
  };


  $scope.total = function (){
      return parseInt($scope.endAmount) + parseInt($scope.addAmount == null ? 0 : $scope.addAmount);
  };

  $scope.getAllAdmins = function (){
    $('#searchAdmin').focus();
    $http.get($adminUrl).success(function(data) {
      $scope.users = data;
    });
  }

  $scope.getAllAdmins();

  //ХЭРЭГЛЭГЧИЙН БЭЛЭН МӨНГӨНИЙ ДАНСЫГ ЦЭНЭГЛЭХ
  $scope.getAccountInfo = function(){
    $http({
    method: 'GET',
    url: $loadUserCashUrl,
    }).then(function successCallback(response) {
        debugger;
        $scope.rank = response.data.rankId
        $scope.endAmount = response.data.cashEndAmount;
        $scope.shAwardAmount = response.data.awardEndAmount;
          
        if($scope.rank != 3)
        {
          if($scope.rank == 1)
          { 
            $scope.shBonusAmountBg = response.data.bonusEndAmount;
          }
          else
          {
            $scope.shBonusAmountAd = response.data.bonusEndAmount;
          }
        }
        else
        {
          $scope.shBonusAmountBg = response.data.bonusEndAmountBg;
          $scope.shBonusAmountAd = response.data.bonusEndAmountAd;
        }

        $scope.edAwardAmount = 0;
        $scope.edBonusAmountBg = 0;
        $scope.edBonusAmountAd = 0;
     }, function errorCallback(response) {
         
     });  
  }

  $scope.makeTransaction = function(){
    if(!$("#searchTrans").val())
    {
       $scope.displayNotification(0 , 'Хэрэглэгч сонгоно уу');
       return;
    }

    if(!$scope.tokenPassword)
    {
       $scope.displayNotification(0 , 'Тан кодоо оруулна уу');
       return;
    }

    var totalAmount = $scope.edAwardAmount + $scope.edBonusAmountAd + $scope.edBonusAmountBg;

    var formData = {
      id : $( "#searchTrans" ).val(),
      rank : $scope.rank,
      awardAmount: $scope.edAwardAmount,
      bonusAmountBg: $scope.edBonusAmountBg,
      bonusAmountAd: $scope.edBonusAmountAd,
      tranToken : $scope.tokenPassword,
    }

    $http({
    method: 'POST',
    url: $makeTranUrl,
    data: formData,

    }).then(function successCallback(response) {
      
      if(response.data.resultCode != 0)
      {
        if(response.data.resultCode == 2)  
          $scope.displayNotification(0 , 'Тан кодоо зөв оруулна уу!');
        else
          $scope.displayNotification(0 , 'Гүйлгээ хийх явцад алдаа гарлаа.');
      }
      else
      {
        $('#UserTrans').modal('hide');
        $scope.displayNotification(0 , 'Гүйлгээ амжилттай хийгдлээ.');
      }

     }, function errorCallback(response) {
         $scope.displayNotification(0 , 'Гүйлгээ хийх явцад алдаа гарлаа.');
     });  
  }

  $scope.isShown = function (type){
    if($scope.rank == 3) return true;
    return type == $scope.rank;
  }

  $scope.loadUserCash = function () {

    if(!$('#searchMoney').val())
    {
       $scope.displayNotification(0 , 'Хэрэглэгч сонгоно уу');
       return;
    }

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
    $('#loader').fadeIn(1);

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
      debugger;
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
        url: $rootUrl + 'get/account',
        data: formData,
      }).then(function successCallback(response) {
          $scope.endAmount = response.data.cashEndAmount; 
      }, function errorCallback(response) {

      });
    }
  };

  $scope.findUser = function(value, index){
		var formData = {
	    	search : value,
	  }
	  $http({
		  method: 'POST',
		  url: $rootUrl + 'get/users',
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
          {
            if(index != 4)
              $scope.endAmount = 0;
          }
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
  $scope.$watch('searchTrans', function(newValue) {
    if (newValue){
      $scope.findUser(newValue, 4);
    }
    else $('.content-list:eq(4)').hide();
  });
});



