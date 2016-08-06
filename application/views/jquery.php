<html>
<head>
	<title>CodeIgniter Ratchet Websocket using jQuery</title>
	<script type="text/javascript">
  		var BASE_URL = "<?php echo base_url(); ?>";
  		var Broadcast = {
							POST : "<?php echo POST; ?>",
							BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
							BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
  						};
  	</script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/Connection2.js"></script>
  	
</head>

<body>

	Header
	<br><br><br>
	
		<div>
            <form name="addPostForm">
                <input type="text" name="postText" id="postText" />
                <input type="submit" name="submit" id="submit" />
            </form>
        </div>

        <div id="messages">
        <?php
        foreach ($posts as $post) {
            ?>
            <div>
                <span><?php echo  $post->postText ?></span>
            </div>
            <?php
        }
        ?>
        </div>
		
	<br><br><br>
	Footer
	
</body>
<script type="text/javascript">

var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

  $(document).ready(function(){

    $("#submit").on("click", function(e){

      e.preventDefault();

      $.ajax({
        type : "POST",
        url : BASE_URL + "addPost",
        dataType : "json",
        data : { postText : $("#postText").val() }
      }).done(function(data){

        if(data.status == "success")
        {
          var typeData = { broadType : Broadcast.POST, data : data.postData};
          conn.sendMsg(typeData);
        }

        $("#postText").val("");
      });




    });


  });

</script>


</html>
