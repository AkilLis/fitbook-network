app.controller('userCtrl', function($scope, $http) {
  	$isproduction = true;
    $baseUrl = $isproduction ? 'http://flexgym.mn/' : 'http://localhost/';
    $scope.notifications = {};
    $scope.totalCount = 0;
    $scope.users = [];

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

    $scope.calcUsageAccount = function () {
      $('#usageaccount').modal('show');
    }

    $scope.checkUsageEnd = function (currentUser) {
      $("#usageUser").val(currentUser == null ? $scope.users[0].userId : currentUser.userId);
      $(".content-list").hide();
      $http({
          method: 'GET',
          url: $baseUrl + 'api/reception/check/usage?userId=' + $('#usageUser').val(),
          }).then(function successCallback(response) 
          {
              debugger;
              $scope.usageEndAmount = response.data.endAmt;
          }, function errorCallback(response) {
      }); 
    }

    $scope.loadGym = function () {
        $http({
          method: 'POST',
          url: $baseUrl + 'api/reception-subusage?amt='+$('#usageAmt').val() + '&userId=' + $('#usageUser').val(),
          }).then(function successCallback(response) {
            debugger;
            if(response.data.result == "success")
            {
               $scope.displayNotification('success' , 'Aмжилттай хадгаллаа.');
               $('#usageUser').val("");
               $scope.usageEndAmount = 0;
               $('#usageaccount').modal('hide');
               location.reload();
            } 
            else
            {
              switch(response.data.result)
              {
                case "_userNotFound":
                  $scope.displayNotification('warning' , 'Хэрэглэгч олдсонгүй.');
                  break;
                case "_accountNotFound":
                  $scope.displayNotification('warning' , 'Данс олдсонгүй.');
                  break;
                case "_endAmount":
                  $scope.displayNotification('warning' , 'Дансны үлдэгдэл хүрэлцэхгүй байна.');
                  break;
              }

              $scope.displayNotification('error' , 'Системд алдаа гарсан байна');
            }
          }, function errorCallback(response) {
              $scope.displayNotification('error' , 'Системд алдаа гарсан байна');
        });    
    }

    $scope.findUser = function(value, isGroupA){
      var formData = {
          search : value,
          isGroupA : isGroupA,
      }
      $http({
        method: 'POST',
        url: $baseUrl + 'get/users',
        data: formData,
      }).then(function successessCallback(response) {
          debugger; 
          if(response.data.gotinfo == "failed")
          {
            $(".content-list").hide();
          }
          else
          {
            $scope.users = response.data.users;
            $(".content-list").fadeIn("fast");   
          }
      }, function errorCallback(response) {

      });
    };

    $scope.$watch('userUsage', function(newVal){
      if(newVal) {
        $scope.findUser(newVal);
      }
      else $('.content-list').hide();  
    });

    $scope.findUserKeyDown = function(event, withAccount){
      if(event.which == 13 && $scope.users.length == 1)
      {
        $scope.checkUsageEnd();
      }
    };

  	$scope.getNotification();

    
});
