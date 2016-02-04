<!DOCTYPE html>
<html ng-app="myApp" ng-controller="mainCtrl">
<head>
	<title></title>
	<script type="text/javascript">
  		var BASE_URL = "<?php echo base_url(); ?>";
  		var Broadcast = {
							POST : "<?php echo POST; ?>",
							BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
							BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
  						};
  	</script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/Connection.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
	<!--
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-animate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-sanitize.min.js"></script>	
	-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-route.min.js"></script>
	
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/myApp.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/mainCtrl.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/secondCtrl.js"></script>
</head>

<body>

	Header
	<br><br><br>
	
		<div ng-view></div>
		
	<br><br><br>
	Footer
	
</body> 
</html>

