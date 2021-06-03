<?php
	include "Connection.php";
	include 'Navigation.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Expired List</title>
	<meta name="viewpoint" content="width=device-width, initial=scale=1">
</head>
<body>
	<div style="height: 90px; background-color: #f2d13e; margin-top: 10px; margin-bottom: 10px; padding: 25px;">
		<?php
			include "SideNav.php"
		?>
	</div>

	<br>
	<h2 style="text-align: center;">Information of Delayed Books</h2>
	<br>

	<form method="post" action="">
		<div style="padding-left: 570px;">
			<button class="btn btn-success" name="submit1">RETURNED</button>
			<button class="btn btn-danger" name="submit2" style="margin-left: 20px;">EXPIRED</button>
		</div><br>
	</form>
	

	<?php
		$c=0;
		if (isset($_SESSION['login_user']))
		{
			$ret='<p style="color:green;">RETURNED</p>';
			$exp='<p style="color:red;">EXPIRED</p>';

			if (isset($_POST['submit1']))
			{
				$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$ret' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
				$res=mysqli_query($db,$sql);
			}

			else if (isset($_POST['submit2']))
			{
				$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$exp' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
				$res=mysqli_query($db,$sql);
			}

			else
			{
				$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve != '' AND issue_book.approve != 'Yes' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
				$res=mysqli_query($db,$sql);
			}

			echo "<table class='table table-bordered table-hover >";
				echo "<tr style='background-color: white;'>";
					echo "<th>"; echo "Book ID"; echo "</th>";
					echo "<th>"; echo "Book Name"; echo "</th>";
					echo "<th>"; echo "Authors Name"; echo "</th>";
					echo "<th>"; echo "Category"; echo "</th>";
					echo "<th>"; echo "Status"; echo "</th>";
					echo "<th>"; echo "Issue Date"; echo "</th>";
					echo "<th>"; echo "Return Date"; echo "</th>";
				echo "</tr>";

				while($row=mysqli_fetch_assoc($res))
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

</body>
</html>