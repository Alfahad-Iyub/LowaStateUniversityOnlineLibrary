<?php
	include "Connection.php";//conneection to th database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Pending Fines</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet -->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
			<?php
				include "SideNav.php";//side navigation bar
			?>
		</div><br>
		<h2 style="text-align: center;">Pending Fines</h2>
		<br>
    	<div class="wrapper">
    		<section>
				<?php
					$res=mysqli_query($db,"SELECT `bid`, `return`, `days`, `fine`, `status` FROM `fine` WHERE `username`='$_SESSION[login_user]' ;");//query to select data from fine table and assigin inside a variable

					echo "<table class='table table-bordered table-hover >";//table creation
					echo "<tr style='background-color: white;'>";
						echo "<th>"; echo "Book ID"; echo "</th>";
						echo "<th>"; echo "Return Date"; echo "</th>";
						echo "<th>"; echo "No. of Days"; echo "</th>";
						echo "<th>"; echo "Fine Ammount"; echo "</th>";
						echo "<th>"; echo "Status"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_array($res))//display fetched data from the variable
					{
						echo "<tr>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['return']; echo "</td>";
							echo "<td>"; echo $row['days']; echo "</td>";
							echo "<td>"; echo $row['fine']; echo "</td>";
							echo "<td>"; echo $row['status']; echo "</td>";
						echo "</tr>";
					}

					echo "</table>";
				?>

	    	</section>
	    	<?php
    			include "Footer.php";//footer bar
    		?>
    	</div>
    </body>
</html>