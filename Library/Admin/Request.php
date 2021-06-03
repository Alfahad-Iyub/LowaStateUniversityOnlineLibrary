<?php
	include "Connection.php";//connection to database
	include 'Navigation.php';//navigation bar
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewpoint" content="width=device-width, initial=scale=1">
</head>
<body>
	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
		<div class="search" style="float: right;">
			<form class="form-inline my-2 my-lg-0" method="post" name="form1">
		        <input class="form-control mr-sm-2" type="text" name="username" placeholder="Username" aria-label="Search" required="">
		        <input class="form-control mr-sm-2" type="text" name="bid" placeholder="Book ID" aria-label="Search" required="">
		        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Approve</button><!-- button to approve book-->
		    </form>
		</div>
		<?php
		include "SideNav.php";//side navigation bar
		?>
	</div>

	</div><br>
	<h2 style="text-align: center;">Requested Books</h2>
	<br>
	<?php
		if (isset($_SESSION['login_user']))//if the user is logged in
		{
			$sql = "SELECT student_details.username,idno,books.id,name,author,category,status FROM student_details inner join issue_book ON student_details.username=issue_book.username inner join books ON issue_book.bid=books.id WHERE issue_book.approve = 'Pending';";
			$res = mysqli_query($db,$sql);//query to fetch data from  database by joining table and asign it into a varaible

			if (mysqli_num_rows($res)==0)
			{
				echo "There is no pending request";
			}
			else
			{
				echo "<table class='table table-bordered table-hover >";//table creation
				echo "<tr style='background-color: white;'>";
					echo "<th>"; echo "Student ID"; echo "</th>";
					echo "<th>"; echo "Student Username"; echo "</th>";
					echo "<th>"; echo "Book ID"; echo "</th>";
					echo "<th>"; echo "Book Name"; echo "</th>";
					echo "<th>"; echo "Authors Name"; echo "</th>";
					echo "<th>"; echo "Category"; echo "</th>";
					echo "<th>"; echo "Status"; echo "</th>";
				echo "</tr>";

				while($row=mysqli_fetch_assoc($res))//displaying fetched data from data base in the variable
				{
					echo "<tr>";
						echo "<td>"; echo $row['idno']; echo "</td>";
						echo "<td>"; echo $row['username']; echo "</td>";
						echo "<td>"; echo $row['id']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['author']; echo "</td>";
						echo "<td>"; echo $row['category']; echo "</td>";
						echo "<td>"; echo $row['status']; echo "</td>";
					echo "</tr>";
				}

				echo "</table>";
			}
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("You need to login first.");
				</script>
			<?php
		}

		if (isset($_POST['submit']))//if the button is pressed
		{
			$_SESSION['name']=$_POST['username'];//new variable
			$_SESSION['bid']=$_POST['bid'];//new variable

			?>
				<script type="text/javascript">
					window.location="Approve.php"//tran sport to new page for approval
				</script>
			<?php
		}
	?>

	<?php
		include "Footer.php";//footer bar
	?>
</body>
</html>