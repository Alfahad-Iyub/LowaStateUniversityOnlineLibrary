<?php
	include 'Connection.php';//connection to the database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Registration</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet -->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
	    	<section>
	    		<div class="registrationbox">
		    		<div class="registration">
		    			<br>
		    			<h1 style="font-size: 40px;">Registration</h1>
		    			<form name="registration" action="" method="post" style="margin-top: 40px; margin-left: 50px"><!-- input boxes -->
		    				<input class="form-control" type="text" name="firstname" placeholder="First Name" required=""><br>
		    				<input class="form-control" type="text" name="lastname" placeholder="Last Name" required=""><br>
		    				<input class="form-control" type="text" name="dateofbirth" placeholder="Date of Birth" required=""><br>
		    				<input class="form-control" type="text" name="gender" placeholder="Gender" required=""><br>
		    				<input class="form-control" type="text" name="contactno" placeholder="Contact No." required=""><br>
		    				<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
		    				<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
		    				<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
		    				<input class="btn btn-warning" type="submit" name="submit" value="Submit" style="width: 100px;">
		    			</form>
		    		</div>
		    	</div>
	    	</section>

			<?php
				
				if(isset($_POST['submit']))//if the button is pressed
				{
					mysqli_query($db,"INSERT INTO `student_details` VALUES('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[dateofbirth]', '$_POST[gender]', '$_POST[contactno]', '$_POST[email]', '$_POST[username]', '$_POST[password]');");//query to insert data into database
				?>
				<script type="text/javascript">
					alert("Registration Successfull!");//alert
				</script>
				<?php
				}
			?>
			
			<?php
    			include "Footer.php";//footer bar
    		?>
    </body>