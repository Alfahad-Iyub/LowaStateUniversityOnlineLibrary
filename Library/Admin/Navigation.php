<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet-->
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial=scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"><!-- link to bootstarp stylesheet-->

	<style type="text/css">
		.navbar .navbar-nav li a{
			color: white !important;
		}

		.navbar .navbar-nav li{
			padding-right: 20px;
		}
	</style>

</head>
<body>

	<?php
		if(isset($_SESSION['login_user']))//if user is logged in
		{?>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="background-color: black !important;">

				<a class="navbar-brand"><img src="images/2.png" width="125px" height="125px"></a>
				<span class="navbar-text" style="font-size: 35px; color: white;">Lowa State University Online Library</span>

				<div class="collapse navbar-collapse justify-content-end" style="font-size: 15px;">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="Home.php">HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Books.php">BOOKS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="StudentDetails.php">MEMBER'S DETAILS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="MyProfile.php">MY PROFILE</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Logout.php">LOGOUT</a>
						</li>
					</ul>
				</div>
			</nav>
			<?php
		}
		else
	    {?>
	    	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="background-color: black !important;">

				<a class="navbar-brand"><img src="images/2.png" width="125px" height="125px"></a>
				<span class="navbar-text" style="font-size: 35px; color: white;">Lowa State University Online Library</span>

				<div class="collapse navbar-collapse justify-content-end" style="font-size: 20px;">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../Home.php">HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../Login.php">LOGIN</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../Registration.php">SIGN UP</a>
						</li>
					</ul>
				</div>
			</nav>
			<?php
	    }

	    ?>

</body>
</html>