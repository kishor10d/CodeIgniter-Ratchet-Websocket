
var secondCtrl = myApp.controller("secondCtrl", ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope){

	/**
	 *This function add post into database 
	 */
	$scope.addPost = function(){
		$http({
			method : "POST",
			url : BASE_URL + 'addPost',				
			data : $.param({'postText':$scope.postText}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function(data){
			$scope.postText = "";
			if(data.status == "success")
			{
				var typeData = { broadType : Broadcast.POST, data : data.postData};
				$rootScope.conn.sendMsg(typeData);
			}
		});
	};
	
	/**
	 *This function gets all post from DB to wall
	 */
	$scope.getPosts = function() {
		
		$http({
			url : BASE_URL + "getPosts",
			method : "POST",
			headers : {	'Content-Type' : 'application/x-www-form-urlencoded'}
		}).success(function(data) {
			
			$rootScope.posts = data.posts;
			
		});
	};

}]);