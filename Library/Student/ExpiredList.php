<?php
	include "Connection.php";//connection to database
	include 'Navigation.php';//navigation bar
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

			$var=0;//variable
			$result=mysqli_query($db,"SELECT * FROM `fine` WHERE `username`='$_SESSION[login_user]' AND `status`='Not Paid' ;");//query to selct data from database and store it in a variable

			while ($r=mysqli_fetch_assoc($result))
			{
				$var = $var+$r['fine'];
			}

			$var2=$var+$_SESSION['fine'];
		?>

		<div style="float: right;"><!-- to display fine ammount-->
			<h2>Your fine is:
				<?php
					echo "Rs.".$var2;
				?>
			</h2>
		</div>
		<?php
			include "SideNav.php";//side navigation bar
		?>
	</div>

	<br>
	<h2 style="text-align: center;">Information of Delayed Books</h2>
	<br>

	<form method="post" action="">
		<div style="padding-left: 570px;">
			<button class="btn btn-success" name="submit1">RETURNED</button><!-- button to view returned books -->
			<button class="btn btn-danger" name="submit2" style="margin-left: 20px;">EXPIRED</button><!-- button to view expired books-->
		</div><br>
	</form>

	<?php
		$c=0;
		if (isset($_SESSION['login_user']))//if the user is logged in
		{
			$ret='<p style="color:green;">RETURNED</p>';//new variable
			$exp='<p style="color:red;">EXPIRED</p>';//new variable

			if (isset($_POST['submit1']))//if the utton is pressed
			{
				$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$ret' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` ASC";
				$res=mysqli_query($db,$sql);//query to view returned books b joining table
			}

			else if (isset($_POST['submit2']))//if the button is pressed
			{
				$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$exp' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` ASC";
				$res=mysqli_query($db,$sql);//query to view expired books by joining table
			}

			else
			{
				$sql="SELECT books.id,name,author,category,approve,issue,issue_book.return FROM issue_book inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$ret' OR issue_book.approve = '$exp' AND issue_book.username = '$_SESSION[login_user]' ORDER BY `issue_book`.`return` ASC";
				$res=mysqli_query($db,$sql);//query to view all issued books by joing table
			}

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

				while($row=mysqli_fetch_assoc($res))//display fetched data inside the variable
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