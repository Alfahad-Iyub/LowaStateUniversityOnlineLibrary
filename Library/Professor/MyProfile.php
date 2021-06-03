<?php
	include "Connection.php";
	include "Navigation.php";
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>My Profile</title>
	    <link rel="stylesheet" type="text/css" href="Style.css">
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">

		<style type="text/css">
			.wrapper1{
				width: 500px;
				margin: 0 auto;
			}
		</style>
    </head>

    <body>
    	<div class="wrapper">
	    	<section>

	    		<div class="container">
	    			<br>
	    			<form action="" method="post">
	    				<button class="btn btn-warning" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
	    			</form>
	    		</div>

	    		<div class="wrapper1">

	    			<?php

	    				if (isset($_POST['submit1'])) 
	    				{
	    					?>

	    						<script type="text/javascript">
	    							window.location="Edit.php"
	    						</script>

	    					<?php
	    				}

	    				$q=mysqli_query($db,"SELECT * FROM professor_details WHERE username='$_SESSION[login_user]' ;");

	    			?>

	    			<h2 style="text-align: center;">My Profile</h2>
	    			<br>

	    			<?php

	    				$row=mysqli_fetch_assoc($q);

	    				echo "<table class='table table-bordered table-hover'>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>First Name: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['firstname'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Last Name: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['lastname'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Date of Birth: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['dateofbirth'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Gender: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['gender'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Contact No: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['contactno'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Email: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['email'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Username: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['username'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "<tr>";
	    					echo "<td>";
	    						echo "<b>Password: </b>";
	    					echo "</td>";

	    					echo "<td>";
	    						echo $row['password'];
	    					echo "</td>";
	    				echo "</tr>";

	    				echo "</table>";

	    			?>
	    			<br>

	    		</div>

	    	</section>
	    	<?php
    			include "Footer.php";
    		?>
    	</div>
    </body>
</html>