app.controller('ceoCtrl', function($scope, $uibModal, $http) 
{
  	$isproduction = true;
    $baseUrl = $isproduction ? 'http://flexgym.mn/' : 'http://localhost/';
    $scope.user_group = {};
    $scope.user_list = {};
    $scope.salaryList = {};
    $scope.activityList = {};
    $scope.dateType = 'Month';
    $scope.profitType = 'Month';

    $scope.openModal = function(id) {
    	var modal = $uibModal.open({
              templateUrl: id + '.html',
              animation: true,
              size: 'sm',
              scope: $scope
      	});
    }

    $scope.getUserGroupDetail = function (groupId) {
    	$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-user/' + groupId,
		    }).then(function successCallback(response) 
		    {
		    	$scope.user_group_detail = response.data;
		    	$scope.openModal('usergroupdetail');
		    }, function errorCallback(response) 
		    {

		    }
		);  	
    }

    $scope.getActivity = function() {
    		$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-activity',
		    }).then(function successCallback(response) {
		    	$scope.activityList = response.data.data;
		    }, function errorCallback(response) {
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
		    	$scope.endSalary = response.data.endSalary;
		    }, function errorCallback(response) {
	    });    
    }

    $scope.getProfitDetailed = function () {
    	$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-profit-detailed?profitType=' + $scope.profitType,
		    }).then(function successCallback(response) {
		    	var profit = response.data.profit;
		    	var activity = response.data.activity;
		    	var salary = response.data.salary;
		    	var endSalary = response.data.endSalary;
		    	
		    	var categories = [];
		    	var profitData = [];
		    	var salaryData = [];
		    	var endSalaryData = [];

		    	switch($scope.profitType)
		    	{
		    		case "Year" : 
		    			for(var i = 2016; i <= profit[profit.length - 1].year; i ++)
		    			{
		    				var j = i - 2016;
		    				categories.push(Number(profit[j].year));
		    				profitData.push(Number(profit[j].totalAmt));
		    				salaryData.push(Number(activity[j].totalAmt) + Number(salary[j].totalAmt));
		    				endSalaryData.push(Number(endSalary[j].totalAmt));
		    			}		    			

		    			break;
		    		case "Month" :

		    			for(var i = 1; i <= profit[profit.length - 1].month; i ++)
		    			{
		    				var j = i - 1;
		    				categories.push(i + ' сар');

		    				var curProfit = [];
		    				var curActivity = [];
		    				var curSalary = [];
		    				var curEndSalary = [];

		    				profit.forEach(function(entry) 
					        {
					        	if(entry.month == i)
					        		curProfit = entry;
							});

							activity.forEach(function(entry) 
					        {
					        	if(entry.month == i)
					        		curActivity = entry;
							});

							salary.forEach(function(entry) 
					        {
					        	if(entry.month == i)
					        		curSalary = entry;
							});

							endSalary.forEach(function(entry) 
					        {
					        	if(entry.month == i)
					        		curEndSalary = entry;
							});

		    				profitData.push(Number((profitData.length == 0 ? 0 : profitData[profitData.length - 1]) + curProfit.length == 0 ? 0 : curProfit.totalAmt));
		    				salaryData.push(Number((salaryData.length == 0 ? 0 : salaryData[salaryData.length - 1]) + 
		    					(Number(curActivity.length == 0 ? 0 : curActivity.totalAmt)) + 
		    					(Number(curSalary.length == 0 ? 0 : curSalary.totalAmt))));
		    				endSalaryData.push(Number((endSalaryData.length == 0 ? 0 :endSalaryData[endSalaryData.length - 1]) + curEndSalary.length == 0 ? 0 : curEndSalary.totalAmt));
		    			}	
		    			debugger;
		    		    break;
		    		case "Day" : 
		    			debugger;
		    			for(var i = 1; i <= profit[profit.length - 1].day; i ++)
		    			{
		    				var j = i - 1;
		    				categories.push(i);

		    				var curProfit = [];
		    				var curActivity = [];
		    				var curSalary = [];
		    				var curEndSalary = [];

		    				profit.forEach(function(entry) 
					        {
					        	if(entry.day == i)
					        		curProfit = entry;
							});

							activity.forEach(function(entry) 
					        {
					        	if(entry.day == i)
					        		curActivity = entry;
							});

							salary.forEach(function(entry) 
					        {
					        	if(entry.day == i)
					        		curSalary = entry;
							});

							endSalary.forEach(function(entry) 
					        {
					        	if(entry.day == i)
					        		curEndSalary = entry;
							});	

							profitData.push(Number((profitData.length == 0 ? 0 : profitData[profitData.length - 1]) + curProfit.length == 0 ? 0 : curProfit.totalAmt));
		    				salaryData.push(Number((salaryData.length == 0 ? 0 : salaryData[salaryData.length - 1]) + 
		    					(Number(curActivity.length == 0 ? 0 : curActivity.totalAmt)) + 
		    					(Number(curSalary.length == 0 ? 0 : curSalary.totalAmt))));
		    				endSalaryData.push(Number((endSalaryData.length == 0 ? 0 :endSalaryData[endSalaryData.length - 1]) + curEndSalary.length == 0 ? 0 : curEndSalary.totalAmt));
		    			}
		    			break;
		    		default :
		    			break;
		    	}

		    	$('#profitChart').highcharts({
			        title: {
			            text: '',
			            x: -20
			        },
			        xAxis: {
			            categories: categories
			        },
			        yAxis: {
			            title: {
			                text: 'Дүн ₮'
			            },
			            plotLines: [{
			                value: 0,
			                width: 1,
			                color: '#808080'
			            }]
			        },
			        tooltip: {
			            valueSuffix: '₮'
			        },
			        series: [{
			            name: 'Ашиг',
			            data: profitData,
			            color: '#66c796'
			        }, {
			            name: 'Зарлага',
			            data: salaryData,
			            color : '#df6a78'
			        }, {
			            name: 'Цалингийн үлдэгдэл',
			            data: endSalaryData,
			            color: '#41cac0'
			        }]
			    });
		    }, function errorCallback(response) {
	    });    
    	profitChart
    }

    $scope.getEndSalary = function() {
    	$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-endSalary',
		    }).then(function successCallback(response) {
		    	$scope.endSalaryList = response.data;
		    	$scope.openModal('endsalary');
		    }, function errorCallback(response) {
	    });
    }

    $scope.getUserRegistrationDetail = function (type, value) {
  		$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-userregistration-detail?type='+type + '&value='+value,
		    }).then(function successCallback(response) 
		    {
		    	$scope.user_registration_detail = response.data;
		    	$scope.openModal('userregistrationdetail');
		    }, function errorCallback(response) 
		    {

		    }
		);   	
    }

    $scope.getUserRegistration = function () {
    	$http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-userregistration?dateType='+$scope.dateType,
		    }).then(function successCallback(response) {

		        $scope.user_list = response.data.users_list;

		        var months = [];
		        var totals = [];

		        switch($scope.dateType)
		        {
		        	case 'Year':
		        		$scope.user_list.forEach(function(entry) 
				        {
				        	months.push(entry.year + ' он');
				        	totals.push(parseInt(entry.total));
						});
		        	break;
		        	case 'Month':
		        		$scope.user_list.forEach(function(entry) 
				        {
				        	months.push(entry.month + ' сар');
				        	totals.push(parseInt(entry.total));
						});
		        	break;
		        	case 'Day':
		        		$scope.user_list.forEach(function(entry) 
				        {
				        	months.push(entry.day + ' өдөр');
				        	totals.push(parseInt(entry.total));
						});
		        	break;
		        	default:
		        	break;
		        }

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
			        plotOptions: {
		                series: {
		                    cursor: 'pointer',
		                    point: {
		                        events: {
		                            click: function (e) {
		                                $scope.getUserRegistrationDetail($scope.dateType, this.category.split(' ')[0]);
		                            }
		                        }
		                    },
		                    marker: {
		                        lineWidth: 1
		                    }
		                }
		            },
			        series: [{
			            name: 'Нийт',
			            data: totals,
			        },]
			    });
		    }, function errorCallback(response) {
	    });    
    }

    $scope.getUserGroup = function () {
	    $http({
	    	    method: 'GET',
	    	    url: $baseUrl + 'api/ceo-usergroup',
		    }).then(function successCallback(response) {
		        $scope.user_group = response.data.users_group;
		    }, function errorCallback(response) {
	    });     
  	}
    

    //Ceo dashboard datas ajax autocall
    $scope.getUserGroup();
    $scope.getUserRegistration();
    $scope.getProfit();
    $scope.getLastSalary();
    $scope.getActivity();
    $scope.getProfitDetailed();
});
