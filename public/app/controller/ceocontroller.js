app.controller('ceoCtrl', ['$scope','$http', function($scope, $http) 
{
  	$isproduction = true;
    $baseUrl = $isproduction ? 'http://flexgym.mn/' : 'http://192.168.1.6/';
    $scope.user_group = {};
    $scope.user_list = {};
    $scope.salaryList = {};
    $scope.activityList = {};

    $scope.getActivity = function() {
    		$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-activity',
		    }).then(function successCallback(response) {
		    	$scope.activityList = response.data.data;
		    	/*$('#mainContainer').fadeIn();*/
		    }, function errorCallback(response) {
		    	/*$('#mainContainer').fadeIn();*/
	    	});  
    }

    $scope.getLastSalary = function() {
    	$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-salary',
		    }).then(function successCallback(response) {
		    	$scope.salaryList = response.data.data;
		    }, function errorCallback(response) {
	    });  
    }

    $scope.getProfit = function() {
    	$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-profit',
		    }).then(function successCallback(response) {
		    	$scope.profit = response.data.profit;
		    	$scope.salary = response.data.salary;
		    	$("#test-cloak").text('lol');
		    }, function errorCallback(response) {
	    });    
    }

    $scope.getUserGroup = function () {
	    $http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-user',
		    }).then(function successCallback(response) {
		        $scope.user_group = response.data.users_group;
		        $scope.user_list = response.data.users_list;

		        var months = [];
		        var totals = [];
		        $scope.user_list.forEach(function(entry) 
		        {
		        	months.push(entry.month + ' сар');
		        	totals.push(entry.total);
				});

		        $('#container').highcharts({
			        title: {
			            text: '',
			            x: -20 //center
			        },
			        subtitle: {
			            text: '',
			            x: -20
			        },
			        xAxis: {
			            categories: months
			        },
			        yAxis: {
			            title: {
			                text: 'Хэрэглэгчийн тоо'
			            },
			            plotLines: [{
			                value: 0,
			                width: 1,
			                color: '#808080'
			            }]
			        },
			        tooltip: {
			            valueSuffix: ''
			        },
			        legend: {
			            layout: 'vertical',
			            align: 'right',
			            verticalAlign: 'middle',
			            borderWidth: 0
			        },
			        series: [{
			            name: 'Нийт',
			            data: totals,
			        },]
			    });
		    }, function errorCallback(response) {
	    });     
  	}
    

    //Ceo dashboard datas ajax autocall
    $scope.getUserGroup();
    $scope.getProfit();
    $scope.getLastSalary();
    $scope.getActivity();
}]);