<?php
	include "Connection.php";//connection to the database
	include 'Navigation.php';//navigatio bar
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewpoint" content="width=device-width, initial=scale=1">
</head>
<body>
	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
		<?php
			include "SideNav.php";//side nvigation bar
		?>
	</div>

	<br>
	<h2 style="text-align: center;">Requested Books</h2>
	<br>

	<?php
		if (isset($_SESSION['login_user']))//if the user is logged in
		{
			$q=mysqli_query($db,"SELECT * FROM `issue_book` WHERE `username`='$_SESSION[login_user]' ;");//query to select data from the database matchig the username and assign into a variable

			if (mysqli_num_rows($q)==0)
			{
				echo "There is no pending request";
			}

			else
			{
				echo "<table class='table table-bordered table-hover >";
				echo "<tr style='background-color: white;'>";
					echo "<th>"; echo "Book ID"; echo "</th>";
					echo "<th>"; echo "Approve Status"; echo "</th>";
					echo "<th>"; echo "Issue Date"; echo "</th>";
					echo "<th>"; echo "Return Date"; echo "</th>";
				echo "</tr>";

				while($row=mysqli_fetch_array($q))//fetch data from the variable
				{
					echo "<tr>";
						echo "<td>"; echo $row['bid']; echo "</td>";
						echo "<td>"; echo $row['approve']; echo "</td>";
						echo "<td>"; echo $row['issue']; echo "</td>";
						echo "<td>"; echo $row['return']; echo "</td>";
					echo "</tr>";
				}

				echo "</table>";
			}
		}

		else
		{
			echo "<br><br>";
			echo "Please login first to see request information";
		}
	?>

	<?php
		include "Footer.php";//footer bar
	?>

</body>
</html>