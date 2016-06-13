var app = angular.module("fitwork", ['ui.bootstrap']);

app.controller('mainCtrl', function($scope, $uibModal, $http, $log) { 

  $isproduction = false;
  $production = $isproduction ? 'http://flexgym.mn/' : 'http://localhost/';

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
  $scope.accountDatas = {};
  $scope.selected = {};

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
  
  $scope.open = function () {
    debugger;
    var modalInstance = $uibModal.open({
        templateUrl: '/fitbook/public/admin/giveSalary.html',
        animation: true,
        controller: 'mainCtrl',
        size: 'lg',
        resolve: {
            items: function () {
                debugger;
            }
        }
    });
  };

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
      case "giveSalary" :
        $scope.endAmount = 0;
        $scope.edAwardAmount = 0;
        $scope.edBonusAmountAd = 0;
        $scope.edBonusAmountBg = 0;
        //$scope.giveSalaryForm.$setPristine();
        $('#giveSalaryForm').trigger("reset");
        $('#GiveSalary').modal('show');
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
      case "newUser" :
        $('#myForm').trigger('reset');
        $http({
          method: 'GET',
          url: $baseUrl + 'admin/users/create',
          }).then(function successCallback(response) {
            $('#userId').val(response.data.nextId);
          }, function errorCallback(response) {
        });

        $('#basicModal').modal('show'); 
        
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

  $scope.myTeam = function(id){
    debugger;
    $http({
        method: 'GET',
        url: $rootUrl + 'myteam/' + id,
        }).then(function successCallback(response) {
          $scope.parentInfo = response.data.parent;
          $scope.userInfo = response.data.user;
          $scope.childsInfo = response.data.childs;
          $scope.breadcrumb = response.data.breadcrumb;
          debugger;
        }, function errorCallback(response) {
    });
  };

  $scope.newUser = function() 
  {
      var formData = {
        userId: $("#userId").val(),
        fName: $( "input[name*='nameF']" ).val(),
        lName: $( "input[name*='nameL']" ).val(),
        email: $( "input[name*='email']" ).val(),
        address: $( "input[name*='address']" ).val(),
        phone: $( "input[name*='phone']" ).val(),
        registryNo: $( "input[name*='registryNo']" ).val(),
        accountId: $( "input[name*='accountId']" ).val(),
      }

      $http({
        method: 'POST',
        url: $baseUrl + 'admin/users',
        data: formData,
        }).then(function successCallback(response) {
          debugger;
          $scope.displayNotification('success' , 'Aмжилттай хадгаллаа.');
          $('#basicModal').modal('hide');
          location.reload();
        }, function errorCallback(response) {
      });
  }

  $scope.getAccountTransactions = function(type) {
      $http({
        method: 'GET',
        url: $baseUrl + 'account/' + type,
        }).then(function successCallback(response) {
          debugger;
          $scope.accountDatas = response.data;

          $('#AccountDetail').modal('show');
          
        }, function errorCallback(response) {
      });
  }

  $scope.setPassword = function () {
    debugger;
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

  $scope.takeSalary = function(){
    if(!$("#searchSalary").val())
    {
       $scope.displayNotification('warning' , 'Хэрэглэгч сонгоно уу');
       return;
    }

    var formData = {
      rank : $scope.rank,
      awardAmount: $scope.edAwardAmount,
      bonusAmountBg: $scope.edBonusAmountBg,
      bonusAmountAd: $scope.edBonusAmountAd,
    }

    $http({
      method: 'PUT',
      url: $rootUrl + 'api/salary/' + $("#searchSalary").val(),
      data: formData,
    }).then(function successCallback(response) {
      
      if(response.data.resultCode != 0)
      {  
        $scope.displayNotification('error' , 'Дансны үлдэгдэл хүрэлцэхгүй байна.');
      }
      else
      {
        $('#GiveSalary').modal('hide');
        $scope.displayNotification('success' , 'Гүйлгээ амжилттай хийгдлээ.');
        location.reload();
      }

     }, function errorCallback(response) {
        $scope.displayNotification('error' , 'Гүйлгээ хийх явцад алдаа гарлаа.');
     });   
  };

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
          $scope.displayNotification('error' , 'Дансны үлдэгдэл хүрэлцэхгүй байна.');
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
      
      if(response.data.status == "success")
      {
        $('#addMoneyfromCEO').modal('hide');
        $scope.displayNotification('success', 'Цэнэглэлээ');   
        location.reload();
      }
      else
      {
        $scope.displayNotification('error', 'Дансны үлдэгдэл хүрэлцэхгүй байна.');    
      }
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

  $scope.findUserKeyDown = function(event, withAccount){
    if(event.which == 13 && $scope.top5users.length == 1)
    {
      $scope.chooseUser(null, withAccount);
    }
  };

  $scope.findUserKeyDownSecond = function(event, withAccount){
    if(event.which == 13 && $scope.top5users.length == 1)
    {
      $scope.chooseUserSecond(null, withAccount);
    }
  };

  $scope.chooseUserSecond = function(currentUser, withAccount){
    $(".content-list-second").hide();
    $(".search-input-second").val(currentUser == null ? $scope.top5users[0].userId : currentUser.userId);
  };

  $scope.chooseUser = function(currentUser, withAccount){
  	$(".content-list").hide();
  	$(".search-input").val(currentUser == null ? $scope.top5users[0].userId : currentUser.userId);
  	
    if(withAccount == 'Y')
    {
      $http({
        method: 'PUT',
        url: $rootUrl + 'api/account/' + (currentUser == null ? $scope.top5users[0].userId : currentUser.userId),
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
          $scope.giveSalaryForm.$setPristine();
      }, function errorCallback(response) {

      });
    }
  };

  $scope.findUser = function(value){
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
		  		$(".content-list").hide();
		  	}
		  	else
		  	{
		  		$scope.top5users = response.data.users;
		  		$(".content-list").fadeIn("fast");   
		  	}
		}, function errorCallback(response) {

		});
  };

  $scope.findUserSecond = function(value){
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
          $(".content-list-second").hide();
        }
        else
        {
          $scope.top5users = response.data.users;
          $(".content-list-second").fadeIn("fast");   
        }
    }, function errorCallback(response) {

    });
  };

  $scope.$watch('searchUser', function(newValue){
    if (newValue){
      $scope.findUser(newValue);
    }
    else $('.content-list').hide();  
  });

  $scope.$watch('searchActivated', function(newValue) {
    if (newValue){
	    $scope.findUserSecond(newValue);
    }
    else $('.content-list-second').hide();
  });

  //DIRECT CAL
  $scope.getAllAdmins();
  $scope.myTeam(0);
});



