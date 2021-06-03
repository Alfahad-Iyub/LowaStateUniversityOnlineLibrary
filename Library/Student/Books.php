<?php
	include "Connection.php";//connection to the database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Student Login</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet-->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div class="wrapper">
	    	<section>
	    		<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
		    		<div class="search" style="float: right; margin-left: 20px;">
			    		<form class="form-inline my-2 my-lg-0" method="post" name="form1">
					        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Book" aria-label="Search" required="">
					        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button><!-- buton to search books-->
					    </form>
		    		</div>
		    		<div class="search" style="float: right;">
			    		<form class="form-inline my-2 my-lg-0" method="post" name="form1">
					        <input class="form-control mr-sm-2" type="text" name="bid" placeholder="Enter Book ID" aria-label="Search" required="">
					        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1">Request</button><!-- button to request book-->
					    </form>
		    		</div>
		    		<?php
		    		include "SideNav.php";//side navigation bar
		    		?>
		    	</div>

				<?php

					if (isset($_POST['submit']))//if the button is pressed
					{
						$q=mysqli_query($db,"SELECT * FROM books WHERE name LIKE '%$_POST[search]%' ");//selcect data from the database matching th search data

						if (mysqli_num_rows($q)==0)
						{
							echo "Sorry! No book found";
						}

						else
						{
							echo "<table class='table table-bordered table-hover >";//table creation
							echo "<tr style='background-color: white;'>";
								echo "<th>"; echo "Book ID"; echo "</th>";
								echo "<th>"; echo "Image"; echo "</th>";
								echo "<th>"; echo "Name"; echo "</th>";
								echo "<th>"; echo "Author"; echo "</th>";
								echo "<th>"; echo "Category"; echo "</th>";
								echo "<th>"; echo "Quantity"; echo "</th>";
								echo "<th>"; echo "Status"; echo "</th>";
								echo "<th>"; echo "Reserve"; echo "</th>";
							echo "</tr>";

							while($row=mysqli_fetch_array($q))//display fetched into the table
							{
								echo "<tr>";
									echo "<td>"; echo $row['id']; echo "</td>";
									echo "<td>"; ?> <img src="<?php echo $row["image"]; ?>" align="center" height="150" width="100"> <?php echo "</td>";
									echo "<td>"; echo $row['name']; echo "</td>";
									echo "<td>"; echo $row['author']; echo "</td>";
									echo "<td>"; echo $row['category']; echo "</td>";
									echo "<td>"; echo $row['quantity']; echo "</td>";
									echo "<td>"; echo $row['status']; echo "</td>";
									?>
									<td>
										<form class="form-inline my-2 my-lg-0" method="post" name="form2"><!-- delete button to delete books -->
									        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1">Reserve</button>
									    </form>
									</td>
									<?php
								echo "</tr>";
							}

							echo "</table>";
						}
					}

					else
					{
						/* if button is not pressed */

					$res=mysqli_query($db,"SELECT * FROM `books`;");//select data from database and assign into the variable

					echo "<table class='table table-bordered table-hover >";//table creation
					echo "<tr style='background-color: white;'>";
						echo "<th>"; echo "Book ID"; echo "</th>";
						echo "<th>"; echo "Image"; echo "</th>";
						echo "<th>"; echo "Name"; echo "</th>";
						echo "<th>"; echo "Author"; echo "</th>";
						echo "<th>"; echo "Category"; echo "</th>";
						echo "<th>"; echo "Quantity"; echo "</th>";
						echo "<th>"; echo "Status"; echo "</th>";
						echo "<th>"; echo "Reserve"; echo "</th>";
					echo "</tr>";

					while($row=mysqli_fetch_array($res))//display fetched data from the variable
					{
						echo "<tr>";
							echo "<td>"; echo $row['id']; echo "</td>";
							echo "<td>"; ?> <img src="<?php echo $row["image"]; ?>" align="center" height="150" width="100"> <?php echo "</td>";
							echo "<td>"; echo $row['name']; echo "</td>";
							echo "<td>"; echo $row['author']; echo "</td>";
							echo "<td>"; echo $row['category']; echo "</td>";
							echo "<td>"; echo $row['quantity']; echo "</td>";
							echo "<td>"; echo $row['status']; echo "</td>";
							?>
							<td>
								<form class="form-inline my-2 my-lg-0" method="post" name="form2"><!-- delete button to delete books -->
							        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1">Reserve</button>
							    </form>
							</td>
							<?php
						echo "</tr>";
					}

					echo "</table>";
					}

					if (isset($_POST['submit1']))//if the button is pressed
					{
						if (isset($_SESSION['login_user']))//if the user is logged in
						{
							mysqli_query($db, "INSERT INTO issue_book VALUES('$_SESSION[login_user]','$_POST[bid]','Pending','','');");//query to insert data into the table

							?>
								<script type="text/javascript">
									window.location="Request.php"//transport to repective page
								</script>
							<?php
						}

						else
						{
							?>
								<script type="text/javascript">
									alert("You need to login first.")//alert
								</script>
							<?php
						}
					}
				?>

	    	</section>
	    	<?php
    			include "Footer.php";//footer bar
    		?>
    	</div>
    </body>
</html>