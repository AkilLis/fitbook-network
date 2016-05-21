var app = angular.module("fitwork", []);

app.controller('mainCtrl', function($scope, $http) { 

  $production = 'http://localhost/fitbook/public/';

  $userUrl = $production + 'admin/users';
  $adminUrl = $production + 'ceo/admins'; 
  $userAuth = $production + 'auth/activate';
  $loadUserCashUrl = $production + 'get/account';
  $makeTranUrl = $production + '/transaction'
  $rootUrl = $production;
  $scope.bonusAmount = 0;
  $scope.cashEndAmount = 0;
  $rank = 1;
  $scope.user = {};
  $scope.changeForm = {};
  $scope.form = {};
  $addAmount = 0;
  $endAmount = 0;

  $scope.displayNotification = function(type, text) {
      $.notify({
        title : "", /*("success" == type ? 'Амжилттай' : ("error" == type ? "Алдаа" : "Сануулах")),*/
        message : text,
        animate : {
          enter : 'animated bounceIn',
          exit : 'animated fadeOutRight'
        },
        newest_on_top: true,
        offset :{
          x:20,
          y:20
        },},{
          type: type
        });
  }

  $scope.init = function(index){

    switch(index) {
      case 'admin' :
        $scope.getAllAdmins();
        $('#AddAdmin').modal('show');
        debugger;
        break;
      case 'moneyTrans' :
        $scope.endAmount = 0;
        $scope.edAwardAmount = 0;
        $scope.edBonusAmountAd = 0;
        $scope.edBonusAmountBg = 0;
        $('#usertranForm').trigger("reset");
        $('#UserTrans').modal('show');
        break;
      case 'sponser' :
        $scope.getAccountInfo();
        $scope.endAmount = 0;
        $scope.edAwardAmount = 0;
        $scope.edBonusAmountAd = 0;
        $scope.edBonusAmountBg = 0;
        $('#sponserForm').trigger("reset");
        $('#MakeSponsor1').modal('show');
        break;
      case 'ceomoney' :
        $scope.endAmount = 0;
        $scope.addAmount = 0;
        $('#addMoneyForm').trigger("reset");
        $('#addMoneyfromCEO').modal('show');
        debugger;
        break;
      case 'changepassword' :
        debugger;
        $("#changeForm").trigger('reset');
        $('#ChangePass').modal('show');
        break;
      default:
        break;

    }
    /*$scope.formCeo.$setPristine();*/
    /*$scope.endAmount.$setPristine;
    $scope.shAwardAmount.$setPristine();
    $scope.shBonusAmountBg.$setPristine();
    $scope.shBonusAmountAd.$setPristine();
    $scope.addAmount = 0;
    $scope.edAwardAmount.$setPristine();
    $scope.edBonusAmountBg.$setPristine();
    $scope.edBonusAmountAd.$setPristine();*/
  };

  $scope.setPassword = function () {
    if(!$('#oldPassword').val())
    {
      $('#oldPassword').focus();
      return;
    }

    if(!$('#newPassword').val())
    {
      $('#newPassword').focus();
      return;
    }

    if($('#newPassword').val() != $('#verifyPassword').val())
    {
      $scope.displayNotification('warning' , 'Баталгаажуулах нууц үгээ зөв оруулна уу.');
      $('#verifyPassword').focus();
      return;
    }

    var formData = {
      oldPassword : $('#oldPassword').val(),
      verifyPassword : $('#verifyPassword').val(),
    }

    $http({
      method: 'POST',
      url: $rootUrl + 'auth/password',
      data : formData,
    }).then(function successCallback(response) {
        if(response.data.status == "_notValid")
        {  
          $scope.displayNotification('warning' , 'Хуучин нууц үгээ зөв оруурна уу.');
          return;
        }

        $scope.displayNotification('success' , 'Амжилттай хадгаллаа.');
        $('#ChangePass').modal('hide');

    }, function errorCallback(response) {
        
    });

  }


  $scope.total = function (){
      return parseInt($scope.cashEndAmount) + parseInt($scope.addAmount == null ? 0 : $scope.addAmount);
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
       $scope.displayNotification('warning' , 'Хэрэглэгч сонгоно уу');
       return;
    }

    if(!$scope.tokenPassword)
    {
       $scope.displayNotification('warning' , 'Тан кодоо оруулна уу');
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
          $scope.displayNotification('warning' , 'Тан кодоо зөв оруулна уу!');
        else
          $scope.displayNotification('error' , 'Гүйлгээ хийх явцад алдаа гарлаа.');
      }
      else
      {
        $('#UserTrans').modal('hide');
        $scope.displayNotification('success' , 'Гүйлгээ амжилттай хийгдлээ.');
        location.reload();
      }

     }, function errorCallback(response) {
         $scope.displayNotification('error' , 'Гүйлгээ хийх явцад алдаа гарлаа.');
     });  
  }

  $scope.isShown = function (type){
    if($scope.rank == 3) return true;
    return type == $scope.rank;
  }

  $scope.loadUserCash = function () {

    debugger;
    if(!$('#searchMoney').val())
    {
       $scope.displayNotification('warning' , 'Хэрэглэгч сонгоно уу');
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
      $scope.displayNotification('success', 'Цэнэглэлээ');   
    }, function errorCallback(response) {
      $scope.displayNotification('error', 'цэнэглэх явцад алдаа гарлаа');
    });     
  }

  //ХЭРЭГЛЭГЧТЭЙ ХОЛБООТОЙ ЛОЖИК

  $scope.activateUser = function(){

    if(!$('#searchActivated').val())
    {
      $scope.displayNotification('warning', 'Идэвхжүүлэх хэрэглэгч сонгон уу.');
      $('#searchActivated').focus();
      return;
    }

    if(!$scope.edEndAmount || $scope.edEndAmount < ($('#rank').prop('checked') ? 120000 : 240000))
    {
      $scope.displayNotification('warning', 'Бэлэн мөнгөний хэмжээ нийт мөнгөний 20% байх шаардлагатай.');
      $('#activate_endcash').focus();
      return;
    }

    var sum = 0;

    debugger;

    if($scope.rank > 2)
    {
      sum += parseInt($scope.edEndAmount) + parseInt($scope.edBonusAmountBg) + parseInt($scope.edAwardAmount) + parseInt($scope.edBonusAmountAd);
    }
    else
    {
      if($scope.rank == 1)
      {
        sum += parseInt($scope.edEndAmount) + parseInt($scope.edBonusAmountBg) + parseInt($scope.edAwardAmount);
      }
      else
      {
        sum += parseInt($scope.edEndAmount) + parseInt($scope.edBonusAmountAd) + parseInt($scope.edAwardAmount);
      }
    }

    if(sum != ($('#rank').prop('checked') ? 600000 : 1200000))
    {
      $scope.displayNotification('error', 'Идэхжүүлэх мөнгө зөрж байна.');
      $('#activate_endcash').focus();
      return;
    }

    $.LoadingOverlay("show");

  	var formData = {
    	id : $( "#searchActivated" ).val(),
    	parentId : $( "#searchSponser" ).val(),
      rank : $('#rank').prop('checked'),
      cashAmount : $scope.edEndAmount,
      awardAmount : $scope.edAwardAmount,
      bonusAmountBg : $scope.edBonusAmountBg,
      bonusAmountAd : $scope.edBonusAmountAd, 
    }

  	$http({
	  method: 'POST',
	  url: $userAuth,
	  data: formData,

	  }).then(function successCallback(response) {

      $.LoadingOverlay("hide");
      
      if(response.data.status == "success")
      {
        $('#MakeSponsor1').modal('hide');
        location.reload();
      }
      else
      {
        if(response.data.status == "_amount")
        {
          $scope.displayNotification('error', 'Дансны үлдэгдэл хүрэлцэхгүй байна.');
        }
      }

	   }, function errorCallback(response) {
	       $.LoadingOverlay("hide");
	   });	
  }

  $scope.attachRole = function (role, id) {
    var formData = {
      roleName : role
    }

    $http({
      method: 'PUT',
      url: $rootUrl + 'auth/attachrole/' + id,
      data : formData,
    }).then(function successCallback(response) {
      $scope.displayNotification('success' , 'Шивэгч эрх нэмлээ');
      debugger;
      $('#img'+ id).attr("src", $rootUrl + 'images/check.png'); 
    }, function errorCallback(response) {
        
    });
  }

  $scope.detachRole = function (role, id) {
    var formData = {
      roleName : role
    }

    $http({
      method: 'PUT',
      url: $rootUrl + 'auth/detachrole/' + id,
      data : formData,
    }).then(function successCallback(response) {
      $scope.displayNotification('success' , 'Шивэгч эрх хаслаа');
      $('#img'+ id).attr("src", $rootUrl + 'images/close.png');
    }, function errorCallback(response) {
        
    });
  }

  $scope.detachAdmin = function(id, index){
  	$http({
  	  method: 'DELETE',
  	  url: $adminUrl + '/' + id,
  	}).then(function successCallback(response) {
  		$scope.users.splice(index, 1);
      $scope.displayNotification('success' , 'Эрх хаслаа');
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
      var formData = {
        id : currentUser == null ? $scope.top5users[0].id : currentUser.id,
      }
      $http({
        method: 'POST',
        url: $rootUrl + 'get/account',
        data: formData,
      }).then(function successCallback(response) {
          debugger;
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
        debugger;
		  	if(response.data.gotinfo == "failed")
		  	{
		  		$(".content-list").hide();
		  	}
		  	else
		  	{
		  		$scope.top5users = response.data.users;
          if($scope.top5users.length != 1)
          {
            if(!(index == 4 || index == 3 || index == 2))
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



