<?php
	include "Connection.php";
	include 'Navigation.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<meta name="viewpoint" content="width=device-width, initial=scale=1">

	<style type="text/css">
		.wrapper {
			width: 400px;
			height: 400px;
			margin: 50px auto;
			background-color: black;
			color: white;
			padding: 27px;
		}

		.form-control {
			width: 250px;
		}
	</style>

</head>
<body>
	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; padding: 25px;">
		<?php
			include "SideNav.php"//side navigation bar
		?>
	</div><br>

	<div class="wrapper">
		<h2 style="text-align: center;">Approve Request</h2><br>
		<div style="padding-left: 50px;">
			<form class="Approve" action="" method="post" name="form1"><!-- input boxes oapprove request-->
		        <input class="form-control mr-sm-2" type="text" name="approve" placeholder="Approved or Not Approved" required=""><br>
		        <input class="form-control mr-sm-2" type="text" name="issue" placeholder="Issue Date YY-MM-DD" required=""><br>
		        <input class="form-control mr-sm-2" type="text" name="return" placeholder="Return Date YY-MM-DD" required=""><br>
		        <button class="btn btn-warning" type="submit" name="submit">Approve</button><!-- approve button -->
		    </form>
		</div>
	</div>

	<?php
		if (isset($_POST['submit'])) 
		{
			mysqli_query($db,"UPDATE `issue_book` SET `approve` = '$_POST[approve]', `issue` = '$_POST[issue]', `return` = '$_POST[return]' WHERE username = '$_SESSION[name]' and bid = '$_SESSION[bid]' and approve = 'Pending' ;");//sql query to update issue details

			mysqli_query($db,"UPDATE `books` SET `quantity`= quantity-1 WHERE `id`= '$_SESSION[bid]' ;");//sql query to update quanitiy in books table

			$res=mysqli_query($db,"SELECT `quantity` FROM `books` WHERE `id`= '$_SESSION[bid]'; ");//assiging query to a varaible

			while ($row=mysqli_fetch_assoc($res)) 
			{
				if ($row['quantity']==0)//check if the co dtion is true
				{
					mysqli_query($db,"UPDATE `books` SET `status`='Not Available' WHERE `id`= '$_SESSION[bid]';");//update status in books table
				}
			}

			?>
				<script type="text/javascript">
					alert("Updated Sucessfully.");//alert box and transport back to request page
					window.location="Request.php"
				</script>
			<?php
		}
	?>

	<?php
	include "Footer.php";//footer bar
	?>

</body>
</html>