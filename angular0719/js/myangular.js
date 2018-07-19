var ky = angular.module("ky",[]);
var myF=function($scope) {
	$scope.greeting={
		text:'Hello AngularJS'
	};
}
ky.controller("myF",myF);