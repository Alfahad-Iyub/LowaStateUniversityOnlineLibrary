<?php
	include "Connection.php";//conecction to database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Books</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet-->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>
    <body>
    	<div class="wrapper">
	    	<section>
	    		<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
		    		<div class="search" style="float: right;">
			    		<form class="form-inline my-2 my-lg-0" method="post" name="form1"><!-- serach bar to search student-->
					        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Book" aria-label="Search" required="">
					        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
					    </form>
		    		</div>
		    		<?php
		    		include "SideNav.php";//side navigation bar
		    		?>
		    	</div>

				<?php

					if (isset($_POST['submit']))//if the button is pressed
					{
						$q=mysqli_query($db,"SELECT * FROM books WHERE name LIKE '%$_POST[search]%' ");//sql query to select all from the table as in search as VARIABLE

						if (mysqli_num_rows($q)==0)//checks if variable matches with the condition
						{
							echo "Sorry! No book found";//alert box
						}

						else
						{
							echo "<table class='table table-bordered table-hover >";//creation of table to display information
							echo "<tr style='background-color: white;'>";
								echo "<th>"; echo "Book ID"; echo "</th>";
								echo "<th>"; echo "Image"; echo "</th>";
								echo "<th>"; echo "Name"; echo "</th>";
								echo "<th>"; echo "Author"; echo "</th>";
								echo "<th>"; echo "Category"; echo "</th>";
								echo "<th>"; echo "Quantity"; echo "</th>";
								echo "<th>"; echo "Status"; echo "</th>";
								echo "<th>"; echo "Remove Book"; echo "</th>";
							echo "</tr>";

							while($row=mysqli_fetch_array($q))
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
											<input type="checkbox" name="keytodelete" value="<?php echo $row['id'];?>">
									        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit1">Delete</button>
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

						$res=mysqli_query($db,"SELECT * FROM `books`;");//sql query to collect informaton from table

						echo "<table class='table table-bordered table-hover >";//creation of table to display information
						echo "<tr style='background-color: white;'>";
							echo "<th>"; echo "Book ID"; echo "</th>";
							echo "<th>"; echo "Image"; echo "</th>";
							echo "<th>"; echo "Name"; echo "</th>";
							echo "<th>"; echo "Author"; echo "</th>";
							echo "<th>"; echo "Category"; echo "</th>";
							echo "<th>"; echo "Quantity"; echo "</th>";
							echo "<th>"; echo "Status"; echo "</th>";
							echo "<th>"; echo "Remove Book"; echo "</th>";
						echo "</tr>";

						while($row=mysqli_fetch_array($res))
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
									<form class="form-inline my-2 my-lg-0" method="post" name="form2"><!-- delete button to delete books-->
										<input type="checkbox" name="keytodelete" value="<?php echo $row['id']; ?>" required="">
								        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="SubmitDeletebtn" style="margin-left: 20px;">Delete</button>
								    </form>
								</td>
								<?php
							echo "</tr>";
						}
						echo "</table>";
					}

					if (isset($_POST['SubmitDeletebtn']))//if the button is pressed
					{
						$key = $_POST['keytodelete'];//variable

						$res=mysqli_query($db,"SELECT * FROM `books` WHERE `id`= '$key' ;");//sql query inside a variable
						if (mysqli_num_rows($res)>0)//checks condition with variable
						{
							mysqli_query($db,"DELETE FROM `books` WHERE `id`= '$key' ;");//sql query which will be impemented if condition is true

							?>
								<script type="text/javascript">
									alert("Book Deleted")
									window.location="Books.php"//alert box and then transport to specified page
								</script>
							<?php
						}

						else
						{
							?>
								<script type="text/javascript">
									alert("Error")//error messagee
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