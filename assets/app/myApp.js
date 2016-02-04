/**
 *
 * File : app.js
 * This is main app
 * 
 * @author : Kishor Mali
 *  
 */

var myApp = angular.module("myApp", ['ngRoute']);

myApp.config(['$routeProvider',function($routeProvider) { 
	$routeProvider.when('/', { templateUrl:BASE_URL+'viewPost', controller:"secondCtrl"});
}]);