<?php
	include "Connection.php";
	include "Navigation.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>

	<style type="text/css">
		.wrapper {
			width: 400px;
			height: 400px;
			margin: 100px auto;
			background-color: black;
			color: white;
			padding: 27px;
		}

		.form-control {
			width: 250px;
		}
	</style>
</head>
<body style="background-image: url(images/13.jpg); background-repeat: no-repeat; background-size: 1350px 755px;">

	<div class="wrapper">
		<h1 style="font-size: 40px; text-align: center;">Password Reset</h1><br>

		<div style="padding-left: 50px;">
			<form action="" method="post">
				<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
				<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
				<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
				<button class="btn btn-warning" type="submit" name="submit">Update</button>
			</form>
		</div>
	</div>
	<?php
		if (isset($_POST['submit']))
		{
			if($sql=mysqli_query($db,"UPDATE professor_details SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
						alert("Password Reseted");
					</script>
				<?php
			}
		}
	?>

	<?php
	include "Footer.php";
	?>
</body>
</html>