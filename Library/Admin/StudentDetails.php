<?php
	include "Connection.php";//connection to the database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Membership Details</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet -->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div class="wrapper">
	    	<section>
	    		<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px;">
		    		<div class="search">
		    			<br>
			    		<form class="form-inline my-2 my-lg-0" method="post" name="form1" style="padding-left: 1000px;">
					        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Members" aria-label="Search" required="">
					        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button><!-- button to search student or professors -->
					    </form>
		    		</div>
		    	</div>

		    	<br>
				<h2 style="text-align: center;">Student's Membership Details</h2>
				<br>

				<?php

					if (isset($_POST['submit']))//if the button is pressed
					{
						$q=mysqli_query($db,"SELECT idno,firstname,lastname,dateofbirth,gender,contactno,email,username FROM `student_details` WHERE username LIKE '%$_POST[search]%' ");//query to select data from database and assign in into variable

						if (mysqli_num_rows($q)==0)
						{
							echo "Sorry! No student found";
						}

						else
						{
							echo "<table class='table table-bordered table-hover'>";//table creation
							echo "<tr style='background-color: white;'>";
								echo "<th>"; echo "ID No."; echo "</th>";
								echo "<th>"; echo "First Name"; echo "</th>";
								echo "<th>"; echo "Last Name"; echo "</th>";
								echo "<th>"; echo "Date of Birth"; echo "</th>";
								echo "<th>"; echo "Gender"; echo "</th>";
								echo "<th>"; echo "Contact No."; echo "</th>";
								echo "<th>"; echo "Email"; echo "</th>";
								echo "<th>"; echo "Username"; echo "</th>";
							echo "</tr>";

							while($row=mysqli_fetch_array($q))//display fetched data from database on the variable
							{
								echo "<tr>";
									echo "<td>"; echo $row['idno']; echo "</td>";
									echo "<td>"; echo $row['firstname']; echo "</td>";
									echo "<td>"; echo $row['lastname']; echo "</td>";
									echo "<td>"; echo $row['dateofbirth']; echo "</td>";
									echo "<td>"; echo $row['gender']; echo "</td>";
									echo "<td>"; echo $row['contactno']; echo "</td>";
									echo "<td>"; echo $row['email']; echo "</td>";
									echo "<td>"; echo $row['username']; echo "</td>";
								echo "</tr>";
							}

							echo "</table>";
						}
					}

					else
					{
						/* if button is not pressed */

					$res=mysqli_query($db,"SELECT idno,firstname,lastname,dateofbirth,gender,contactno,email,username FROM `student_details`;");//query to select data from database and assign in into the variable

					echo "<table class='table table-bordered table-hover >";//table creation
					echo "<tr style='background-color: white;'>";
						echo "<th>"; echo "ID No."; echo "</th>";
						echo "<th>"; echo "First Name"; echo "</th>";
						echo "<th>"; echo "Last Name"; echo "</th>";
						echo "<th>"; echo "Date of Birth"; echo "</th>";
						echo "<th>"; echo "Gender"; echo "</th>";
						echo "<th>"; echo "Contact No."; echo "</th>";
						echo "<th>"; echo "Email"; echo "</th>";
						echo "<th>"; echo "Username"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_array($res))//display feteched data from the variable
					{
						echo "<tr>";
							echo "<td>"; echo $row['idno']; echo "</td>";
							echo "<td>"; echo $row['firstname']; echo "</td>";
							echo "<td>"; echo $row['lastname']; echo "</td>";
							echo "<td>"; echo $row['dateofbirth']; echo "</td>";
							echo "<td>"; echo $row['gender']; echo "</td>";
							echo "<td>"; echo $row['contactno']; echo "</td>";
							echo "<td>"; echo $row['email']; echo "</td>";
							echo "<td>"; echo $row['username']; echo "</td>";
						echo "</tr>";
					}

					echo "</table>";
					}
				?>

				<br>
				<h2 style="text-align: center;">Professor's Membership Details</h2>
				<br>

				<?php

					if (isset($_POST['submit']))//if the button is pressed
					{
						$q=mysqli_query($db,"SELECT idno,firstname,lastname,dateofbirth,gender,contactno,email,username FROM `professor_details` WHERE username LIKE '%$_POST[search]%' ");//query to select data from database and assign in into variable

						if (mysqli_num_rows($q)==0)
						{
							echo "Sorry! No student found";
						}

						else
						{
							echo "<table class='table table-bordered table-hover'>";//table creation
							echo "<tr style='background-color: white;'>";
								echo "<th>"; echo "ID No."; echo "</th>";
								echo "<th>"; echo "First Name"; echo "</th>";
								echo "<th>"; echo "Last Name"; echo "</th>";
								echo "<th>"; echo "Date of Birth"; echo "</th>";
								echo "<th>"; echo "Gender"; echo "</th>";
								echo "<th>"; echo "Contact No."; echo "</th>";
								echo "<th>"; echo "Email"; echo "</th>";
								echo "<th>"; echo "Username"; echo "</th>";
							echo "</tr>";

							while($row=mysqli_fetch_array($q))//display fetched data from database on the variable
							{
								echo "<tr>";
									echo "<td>"; echo $row['idno']; echo "</td>";
									echo "<td>"; echo $row['firstname']; echo "</td>";
									echo "<td>"; echo $row['lastname']; echo "</td>";
									echo "<td>"; echo $row['dateofbirth']; echo "</td>";
									echo "<td>"; echo $row['gender']; echo "</td>";
									echo "<td>"; echo $row['contactno']; echo "</td>";
									echo "<td>"; echo $row['email']; echo "</td>";
									echo "<td>"; echo $row['username']; echo "</td>";
								echo "</tr>";
							}

							echo "</table>";
						}
					}

					else
					{
						/* if button is not pressed */

					$res=mysqli_query($db,"SELECT idno,firstname,lastname,dateofbirth,gender,contactno,email,username FROM `professor_details`;");//query to select data from database and assign in into the variable

					echo "<table class='table table-bordered table-hover >";//table creation
					echo "<tr style='background-color: white;'>";
						echo "<th>"; echo "ID No."; echo "</th>";
						echo "<th>"; echo "First Name"; echo "</th>";
						echo "<th>"; echo "Last Name"; echo "</th>";
						echo "<th>"; echo "Date of Birth"; echo "</th>";
						echo "<th>"; echo "Gender"; echo "</th>";
						echo "<th>"; echo "Contact No."; echo "</th>";
						echo "<th>"; echo "Email"; echo "</th>";
						echo "<th>"; echo "Username"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_array($res))//display feteched data from the variable
					{
						echo "<tr>";
							echo "<td>"; echo $row['idno']; echo "</td>";
							echo "<td>"; echo $row['firstname']; echo "</td>";
							echo "<td>"; echo $row['lastname']; echo "</td>";
							echo "<td>"; echo $row['dateofbirth']; echo "</td>";
							echo "<td>"; echo $row['gender']; echo "</td>";
							echo "<td>"; echo $row['contactno']; echo "</td>";
							echo "<td>"; echo $row['email']; echo "</td>";
							echo "<td>"; echo $row['username']; echo "</td>";
						echo "</tr>";
					}

					echo "</table>";
					}
				?>

	    	</section>
	    	<?php
    			include "Footer.php";//footer bar
    		?>
    	</div>
    </body>
</html>