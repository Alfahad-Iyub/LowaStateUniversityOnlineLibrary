<?php
	include "Connection.php";//connection to database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Pending Fines</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet-->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
			<div class="search" style="float: right;">
	    		<form class="form-inline my-2 my-lg-0" method="post" name="form1"><!-- button to search student username-->
			        <input class="form-control mr-sm-2" type="text" name="username" placeholder="Username" aria-label="Search" required="">
			        <input class="form-control mr-sm-2" type="text" name="bid" placeholder="Book ID" aria-label="Search" required="">
			        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Paid</button>
			    </form>
			</div>
			<?php
			include "SideNav.php"//side navigation bar
			?>
		</div><br>
		<h2 style="text-align: center;">Pending Fines</h2>
		<br>
    	<div class="wrapper">
    		<section>
				<?php

					if (isset($_POST['submit']))//if the button is pressed
					{
						mysqli_query($db,"UPDATE `fine` SET `status`= 'Paid' WHERE `username`= '$_POST[username]' AND `bid`= '$_POST[bid]' AND `status`= 'Not Paid' ;");
					}

					else
					{

					
					}

					$res=mysqli_query($db,"SELECT * FROM `fine`;");//query to select data from database and assigned in variable

					echo "<table class='table table-bordered table-hover >";//table creation
					echo "<tr style='background-color: white;'>";
						echo "<th>"; echo "Username"; echo "</th>";
						echo "<th>"; echo "Book ID"; echo "</th>";
						echo "<th>"; echo "Return Date"; echo "</th>";
						echo "<th>"; echo "No. of Days"; echo "</th>";
						echo "<th>"; echo "Fine Ammount"; echo "</th>";
						echo "<th>"; echo "Status"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_array($res))//fetch data from the variable
					{
						echo "<tr>";//display fetched data from variable 
							echo "<td>"; echo $row['username']; echo "</td>";
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