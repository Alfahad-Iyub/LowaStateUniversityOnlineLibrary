<?php
	include 'Connection.php';//connection the the database
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
	    		<div class="edit" style="padding-top: 25px;">
		    		<div class="registration">
		    			<h1 style="font-size: 40px;">Edit Profile</h1>

		    			<?php

		    				$sql = "SELECT * FROM `student_details` WHERE `username`='$_SESSION[login_user]'";//query to select data from database matching the logged in username
		    				$result = mysqli_query($db,$sql) or die (mysqli_error());//assign database connection n sql query in one variable

		    				while ($row = mysqli_fetch_assoc($result))//display fetched data from variable
		    				{
		    					$firstname=$row['firstname'];
		    					$lastname=$row['lastname'];
		    					$dateofbirth=$row['dateofbirth'];
		    					$gender=$row['gender'];
		    					$contactno=$row['contactno'];
		    					$email=$row['email'];
		    					$username=$row['username'];
		    					$password=$row['password'];
		    				}

		    			?>

		    			<form name="registration" action="" method="post" style="margin-top: 40px; margin-left: 50px"><!-- inut boxes -->
		    				<input class="form-control" type="text" name="firstname" placeholder="First Name" required="" value="<?php echo $firstname; ?>"><br>
		    				<input class="form-control" type="text" name="lastname" placeholder="Last Name" required="" value="<?php echo $lastname; ?>"><br>
		    				<input class="form-control" type="text" name="dateofbirth" placeholder="Date of Birth" required="" value="<?php echo $dateofbirth; ?>"><br>
		    				<input class="form-control" type="text" name="gender" placeholder="Gender" required="" value="<?php echo $gender; ?>"><br>
		    				<input class="form-control" type="text" name="contactno" placeholder="Contact No." required="" value="<?php echo $contactno; ?>"><br>
		    				<input class="form-control" type="text" name="email" placeholder="Email" required="" value="<?php echo $email; ?>"><br>
		    				<input class="form-control" type="text" name="username" placeholder="Username" required="" value="<?php echo $username; ?>"><br>
		    				<input class="form-control" type="text" name="password" placeholder="Password" required="" value="<?php echo $password; ?>"><br>
		    				<input class="btn btn-warning" type="submit" name="submit" value="Save" style="width: 100px;">
		    			</form>
		    		</div>
		    	</div>

		    	<?php

		    		if (isset($_POST['submit']))//if the button is pressed
		    		{
		    			$firstname=$_POST['firstname'];
    					$lastname=$_POST['lastname'];
    					$dateofbirth=$_POST['dateofbirth'];
    					$gender=$_POST['gender'];
    					$contactno=$_POST['contactno'];
    					$email=$_POST['email'];
    					$username=$_POST['username'];
    					$password=$_POST['password'];

    					$sql1 = "UPDATE `student_details` SET `firstname`='$firstname', `lastname`='$lastname', `dateofbirth`='$dateofbirth', `gender`='$gender', `contactno`='$contactno',`email`='$email', `username`='$username', `password`='$password' WHERE `username`='".$_SESSION['login_user']."';";//query to update data and asigned it into a variable

    					if(mysqli_query($db,$sql1))//checks if the condition is true
    					{
    						?>

    						<script type="text/javascript">
    							alert("Saved Successfully.")//alert
    							window.location="MyProfile.php"//transport to respective location
    						</script>

    						<?php
    					}
		    		}

		    	?>
	    	</section>
			
			<?php
    			include "Footer.php";//footer bar
    		?>
    </body>
</html>