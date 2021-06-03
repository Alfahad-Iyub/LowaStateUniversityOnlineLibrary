<?php
	include "Connection.php";//connection to database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Login</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!--link to css stylesheet-->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div class="wrapper">
		    <section>
	    		<div class="studentloginbox">
		    		<div class="studentlogin" style="height: 425px;">
		    			<br>
		    			<h1 style="font-size: 40px;">Login</h1>
		    			<form name="logindetails" action="" method="post" style="margin-top: 20px; margin-left: 50px"><!--login box-->
		    				<p>Login as: </p>
		    				<input class="form-check-input" type="radio" value="student" name="user" id="student" style="margin-left: 20px;">
							<label style="margin-left: 40px;" for="student">Student</label>
							<input class="form-check-input" type="radio" value="admin" name="user" id="admin" style="margin-left: 30px;">
							<label style="margin-left: 50px;" for="admin">Admin</label>
							<input class="form-check-input" type="radio" value="professor" name="user" id="professor" style="margin-left: 30px;">
							<label style="margin-left: 50px;" for="admin">Professor</label>
		    				<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
		    				<input  class="form-control" type="password" name="password" placeholder="Password" required=""><br>
		    				<input class="btn btn-warning" type="submit" name="submit" value="Submit" style="width: 100px;"><!--submit button-->
		    				<br>
		    			</form>
		    			<div class="links">
			    			<p style="font-family: Candara">
			    				<br>
			    				<a href="UpdatePassword.php"><em>Forgot Pasword?</em></a><br>
			    				New to this website?<a href="Registration.php"> <em>Sign up</em></a>
			    			</p>
		    			</div>
		    		</div>
		    	</div>
	    	</section>

	    	<?php

	    		if(isset($_POST['submit']))//if submitt button is pressed
				{
					if ($_POST['user']=='admin') 
					{
						$count=0;
						$res=mysqli_query($db,"SELECT * FROM `admin_details` WHERE username='$_POST[username]' && password='$_POST[password]';");//sql query
						$count=mysqli_num_rows($res);//assigning variable

						if($count==0)
						{
							?>
								<script type="text/javascript">
									alert("The username and password dosnt match.");//alert box
								</script>
							<?php
						}

						else
						{
							$_SESSION['login_user'] = $_POST['username'];
							?>
								<script type="text/javascript">
									window.location="Admin/Home.php"//if login matched transport to specified location
								</script>
							<?php
						}
					}

					elseif ($_POST['user']=='student')
					{
						$count=0;
						$res=mysqli_query($db,"SELECT * FROM `student_details` WHERE username='$_POST[username]' && password='$_POST[password]';");//sql query
						$count=mysqli_num_rows($res);//assigning variable

						if($count==0)
						{
							?>
								<script type="text/javascript">
									alert("The username and password dosnt match.");//alert box
								</script>
							<?php
						}

						else
						{
							$_SESSION['login_user'] = $_POST['username'];
							?>
								<script type="text/javascript">
									window.location="Student/Home.php"//if login matched transport to specified page
								</script>
							<?php
						}
					}

					else
					{
						$count=0;
						$res=mysqli_query($db,"SELECT * FROM `professor_details` WHERE username='$_POST[username]' && password='$_POST[password]';");//sql query
						$count=mysqli_num_rows($res);

						if($count==0)
						{
							?>
								<script type="text/javascript">
									alert("The username and password dosnt match.");//alert box
								</script>
							<?php
						}

						else
						{
							$_SESSION['login_user'] = $_POST['username'];
							?>
								<script type="text/javascript">
									window.location="Professor/Home.php"//if login matched transport to specified page
								</script>
							<?php
						}
					}
				}
	    	?>
	    	<?php
	    		include "Footer.php";//footer
	    	?>
	    </div>
    </body>
</html>