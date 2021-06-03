<?php
	include 'Connection.php';//connection to database
	include 'Navigation.php'//navbar
?>

<!DOCTYPE html>
<html>

    <head>
	    <title>Add Book</title>
	    <link rel="stylesheet" type="text/css" href="Style.css"><!-- link to css stylesheet -->
	    <meta charset="utf-8">
	    <meta name="viewpoint" content="width=device-width, initial=scale=1">
    </head>

    <body>
    	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
	    	<?php
	    		include "SideNav.php"//side navigation bar
	    	?>
	    </div>

    	<section>
			<h1 style="font-size: 40px; margin-top:40px; text-align: center;">Add Book</h1><br>
			<form class="books" action="" method="post"><!-- adding books details to the database-->
				<input class="form-control" type="text" name="id" placeholder="Book ID" required=""><br>
				<input class="form-control" type="text" name="image" placeholder="Image URL" required=""><br>
				<input class="form-control" type="text" name="name" placeholder="Book Name" required=""><br>
				<input class="form-control" type="text" name="author" placeholder="Author" required=""><br>
				<input class="form-control" type="text" name="category" placeholder="Category" required=""><br>
				<input class="form-control" type="text" name="quantity" placeholder="Quantity" required=""><br>
				<input class="form-control" type="text" name="status" placeholder="Status" required=""><br>
				<input class="btn btn-warning" type="submit" name="submit" value="Submit" style="width: 100px;"><!-- submit button to insert-->
			</form><br><br>
		</section>
		<?php
			if (isset($_POST['submit']))//if submit button is pressed
			{

				mysqli_query($db,"INSERT INTO `books` VALUES ('$_POST[id]', '$_POST[image]', '$_POST[name]', '$_POST[author]', '$_POST[category]', '$_POST[quantity]', '$_POST[status]') ;");//sql query to insert into the database

				?>
				<script type="text/javascript">
					alert("Book added sucessfuly")//alert box
				</script>
				<?php
			}
		?>

		<?php
			include "Footer.php";//footer bar
		?>
    </body>
</html>	