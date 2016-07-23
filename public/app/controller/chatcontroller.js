var app = angular.module("fitwork", ['ui.bootstrap', 'ngRoute']);

app.controller('chatCtrl', function($scope, $http) 
{
  	$isproduction = false;
    $baseUrl = $isproduction ? 'http://flexgym.mn/' : 'http://localhost/';
    $scope.messages = {};

    var socket = io('http://localhost:3000/');

    socket.on('flexgym:App\\Events\\Chat', function(data){
    	debugger;
    	/*$scope.messages.push(data.chat);*/
    });
});
