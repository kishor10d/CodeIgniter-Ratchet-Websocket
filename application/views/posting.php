<div ng-controller="secondCtrl" ng-init="getPosts()">
	
	<form name="addPostForm" ng-model="addPostForm" >
		<input type="text" ng-model="postText" />
		<input type="submit" name="submit" ng-click="addPost()" />
	</form>
</div>
											
<div ng-repeat="post in posts">
	<div>
		<span> {{post.postText}} </span>
	</div>
</div>