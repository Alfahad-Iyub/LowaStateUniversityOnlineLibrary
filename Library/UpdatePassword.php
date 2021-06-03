<?php
	include "Connection.php";//connection to database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Login</title>
	    <link rel="stylesheet" type="text/css" href="Style.css">
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div class="wrapper">
		    <section>
	    		<div class="studentloginbox">
		    		<div class="studentlogin" style="height: 300px; padding-top: 20px">
		    			<br>
		    			<h1 style="font-size: 40px;">Forgot Password</h1>
		    			<form name="registerdetails" action="" method="post" style="margin-top: 40px; margin-left: 50px">
		    				<p>Sign-Up as: </p>
		    				<input class="btn btn-warning" type="submit" name="submit1" value="Student" style="width: 100px; margin-right: 20px;">
		    				<input class="btn btn-warning" type="submit" name="submit2" value="Librarian" style="width: 100px; margin-right: 20px;">
		    				<input class="btn btn-warning" type="submit" name="submit3" value="Professor" style="width: 100px;">
		    				<br>
		    			</form>
		    		</div>
		    	</div>
	    	</section>

	    	<?php

	    		if(isset($_POST['submit1']))
				{
					?>
						<script type="text/javascript">
							window.location="Student/UpdatePassword.php"//transport to necessary page when the button is clicked
						</script>
					<?php
				}

				elseif(isset($_POST['submit2']))
				{
					?>
						<script type="text/javascript">
							window.location="Admin/UpdatePassword.php"//transport to necessary page when the button is clicked
						</script>
					<?php
				}

				elseif (isset($_POST['submit3']))
				{
					?>
						<script type="text/javascript">
							window.location="Professor/UpdatePassword.php"//transport to necessary page when the button is clicked
						</script>
					<?php
				}
	    	?>
	    	<?php
	    		include "Footer.php";//footer bar
	    	?>
	    </div>
    </body>
</html>