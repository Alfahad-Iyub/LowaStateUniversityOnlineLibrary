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
		<div class="search" style="float: right;">
    		<form class="form-inline my-2 my-lg-0" method="post" name="form1"><!-- button to click when a book is returned-->
		        <input class="form-control mr-sm-2" type="text" name="username" placeholder="Username" aria-label="Search" required="">
		        <input class="form-control mr-sm-2" type="text" name="bid" placeholder="Book ID" aria-label="Search" required="">
		        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Returned</button>
		    </form>
		</div>
		<?php
		include "SideNav.php";//side navigation bar
		?>
	</div>

	<?php
		if (isset($_POST['submit'])) //if the butto is pressed
		{

			$res=mysqli_query($db,"SELECT * FROM `issue_book` WHERE `username`='$_POST[username]' AND `bid`='$_POST[bid]' ;");//sql query in a variable

			while ($row=mysqli_fetch_assoc($res)) //fetch data
			{
				$d= strtotime($row['return']);//return date from database
				$c= strtotime(date("Y-m-d"));//current date

				$diff= $c-$d;//diffeence of both

				if ($diff>=0) 
				{
					$day = floor($diff/(60*60*24));//calculation ino no.of days
					$fine = $day*100;//fine ammount per day
				}
			}

			$x=date('Y-m-d');
			
			mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine', 'Not Paid') ;");//query to insert data into fine table

			$var='<p style="color:green;">RETURNED</p>';
			mysqli_query($db,"UPDATE `issue_book` SET `approve`='$var' WHERE `username`='$_POST[username]' AND `bid`='$_POST[bid]' ");//updates issue book tables approve coloumn

			mysqli_query($db,"UPDATE `books` SET `quantity`= quantity+1 WHERE `id`= '$_SESSION[bid]' ;");//updates book tables quanitiy
		}
	?>

	<br>
	<h2 style="text-align: center;">Information of Delayed Books</h2>
	<br>

	<form method="post" action="">
		<div style="padding-left: 570px;">
			<button class="btn btn-success" name="submit1">RETURNED</button><!-- button to view returned books-->
			<button class="btn btn-danger" name="submit2" style="margin-left: 20px;">EXPIRED</button><!-- button  to view expired books-->
		</div><br>
	</form>

	<?php
		$c=0;

		if (isset($_SESSION['login_user']))//if the user is logged in
		{
			$ret='<p style="color:green;">RETURNED</p>';
			$exp='<p style="color:red;">EXPIRED</p>';

			if (isset($_POST['submit1']))
			{
				$sql="SELECT student_details.username,idno,books.id,name,author,category,approve,issue,issue_book.return FROM student_details inner join issue_book ON student_details.username=issue_book.username inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$ret' ORDER BY `issue_book`.`return` ASC";//query to iew returned books by joining tables
				$res=mysqli_query($db,$sql);
			}

			else if (isset($_POST['submit2']))
			{
				$sql="SELECT student_details.username,idno,books.id,name,author,category,approve,issue,issue_book.return FROM student_details inner join issue_book ON student_details.username=issue_book.username inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$exp' ORDER BY `issue_book`.`return` ASC";//query to view expired books by joining tables
				$res=mysqli_query($db,$sql);
			}

			else
			{
				$sql="SELECT student_details.username,idno,books.id,name,author,category,approve,issue,issue_book.return FROM student_details inner join issue_book ON student_details.username=issue_book.username inner join books ON issue_book.bid=books.id WHERE issue_book.approve = '$ret' OR issue_book.approve = '$exp' ORDER BY `issue_book`.`return` ASC";//query to view all expired and returned book by joining tables
				$res=mysqli_query($db,$sql);
			}

			echo "<table class='table table-bordered table-hover >";//cretion of tables
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

				while($row=mysqli_fetch_assoc($res))
				{
					echo "<tr>";//data fetched from database and displayed in rows
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
				}

			echo "</table>";
		}
	?>

	<?php
		include "Footer.php";//footer bar
	?>

</body>
</html>