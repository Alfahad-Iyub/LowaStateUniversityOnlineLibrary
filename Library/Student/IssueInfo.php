<?php
	include "Connection.php";//connection to the database
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
		<?php
			include "SideNav.php";//side navigation bar
		?>
	</div>

	<br>
	<h2 style="text-align: center;">Information of Borrowed Books</h2>
	<br>

	<?php
		if (isset($_SESSION['login_user']))//if the usr is logged in
		{
			$exp='<p style="color:red;">EXPIRED</p>';//new variable
			$ret='<p style="color:green;">RETURNED</p>';//new variable

			$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve = 'Approved' OR issue_book.approve = '$exp' OR issue_book.approve = '$ret' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` ASC";//query to selct data from the database by joining table

			$res=mysqli_query($db,$sql);//assigin the query and database connection to variable

			echo "<table class='table table-bordered table-hover >";//table creation
				echo "<tr style='background-color: white;'>";
					echo "<th>"; echo "Book ID"; echo "</th>";
					echo "<th>"; echo "Book Name"; echo "</th>";
					echo "<th>"; echo "Authors Name"; echo "</th>";
					echo "<th>"; echo "Category"; echo "</th>";
					echo "<th>"; echo "Status"; echo "</th>";
					echo "<th>"; echo "Issue Date"; echo "</th>";
					echo "<th>"; echo "Return Date"; echo "</th>";
				echo "</tr>";

				while($row=mysqli_fetch_assoc($res))//display fetched data from the variable
				{
					echo "<tr>";
						echo "<td>"; echo $row['id']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['author']; echo "</td>";
						echo "<td>"; echo $row['category']; echo "</td>";
						echo "<td>"; echo $row['approve']; echo "</td>";
						echo "<td>"; echo $row['issue']; echo "</td>";
						echo "<td>"; echo $row['return']; echo "</td>";
					echo "</tr>";
				}

			echo "</table>";
		}
	?>

	<?php
		include "Footer.php";//footer bar
	?>

</body>
</html>