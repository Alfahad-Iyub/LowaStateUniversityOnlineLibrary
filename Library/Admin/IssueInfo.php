<?php
	include "Connection.php";//connecion to database
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
		$c=0;
		if (isset($_SESSION['login_user']))//if user is logged in
		{
			$ret='<p style="color:green;">RETURNED</p>';//variable creation
			$exp='<p style="color:red;">EXPIRED</p>';//variable creation

			$sql="SELECT student_details.username,idno,books.id,name,author,category,approve,issue,issue_book.return FROM student_details inner join issue_book ON student_details.username=issue_book.username inner join books ON issue_book.bid=books.id WHERE issue_book.approve = 'Approved' OR issue_book.approve = '$ret' OR issue_book.approve = '$exp' ORDER BY `issue_book`.`return` DESC";//query to selet data from database by joning table

			$res=mysqli_query($db,$sql);//assiging database connection and sql query into a variable

			echo "<table class='table table-bordered table-hover >";//table creation
				echo "<tr style='background-color: white;'>";
					echo "<th>"; echo "Student ID"; echo "</th>";
					echo "<th>"; echo "Student Username"; echo "</th>";
					echo "<th>"; echo "Book ID"; echo "</th>";
					echo "<th>"; echo "Book Name"; echo "</th>";
					echo "<th>"; echo "Authors Name"; echo "</th>";
					echo "<th>"; echo "Category"; echo "</th>";
					echo "<th>"; echo "Status"; echo "</th>";
					echo "<th>"; echo "Issue Date"; echo "</th>";
					echo "<th>"; echo "Return Date"; echo "</th>";
				echo "</tr>";


				while($row=mysqli_fetch_assoc($res))//fetching data fro variable which fetched data from database
				{
					echo "<tr>";
						echo "<td>"; echo $row['idno']; echo "</td>";
						echo "<td>"; echo $row['username']; echo "</td>";
						echo "<td>"; echo $row['id']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['author']; echo "</td>";
						echo "<td>"; echo $row['category']; echo "</td>";
						echo "<td>"; echo $row['approve']; echo "</td>";
						echo "<td>"; echo $row['issue']; echo "</td>";
						echo "<td>"; echo $row['return']; echo "</td>";
					echo "</tr>";

					$d=date("Y-m-d");//current date
					if ($d > $row['return']) //condition to checkif return date is passed
					{
						$c=$c+1;
						$var='<p style="color:red;">EXPIRED</p>';//assiging variable

						mysqli_query($db,"UPDATE `issue_book` SET `approve`='$var' WHERE `return`='$row[return]' AND approve='Approved' limit $c;");//query to update issue book table if the date is expired
					}
				}

			echo "</table>";
		}
	?>

	<?php
		include "Footer.php";//footer bar
	?>

</body>
</html>