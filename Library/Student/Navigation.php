<?php
	session_start();
	include 'Connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Style.css">
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial=scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

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
		if(isset($_SESSION['login_user']))
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
							<a class="nav-link" href="Books.php">BROWSE BOOKS</a>
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

	<?php

		if (isset($_SESSION['login_user'])) 
		{
			$day=0;

			$exp='<p style="color:red;">EXPIRED</p>';
			$res=mysqli_query($db,"SELECT `return` FROM `issue_book` WHERE `username`='$_SESSION[login_user]' AND `approve`='$exp' ;");

			while ($row=mysqli_fetch_assoc($res)) 
			{
				$d= strtotime($row['return']);
				$c= strtotime(date("Y-m-d"));

				$diff= $c-$d;

				if ($diff>=0) 
				{
					$day = $day+floor($diff/(60*60*24));
				}
			}
			
			$_SESSION['fine']=$day*100;
		}

	?>
</body>
</html>