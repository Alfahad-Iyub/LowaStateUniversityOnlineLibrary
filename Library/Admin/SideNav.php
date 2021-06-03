
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
    	body {
		  font-family: "Lato", sans-serif;
		}

		.sidenav {
		  height: 100%;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: black;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}

		.h:hover {
			color: white;
			width: 300px;
			height: 50px;
			background-color: #f2d13e;
		}

		.books {
			width: 400px;
			margin: 0px auto;
		}
    </style>
</head>
<body>

	<section>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <div class="h"><a href="AddBooks.php">Add Books</a></div>
		  <div class="h"><a href="Request.php">Requested Books</a></div>
		  <div class="h"><a href="IssueInfo.php">Issue Information</a></div>
		  <div class="h"><a href="ExpiredList.php">Expired List</a></div>
		  <div class="h"><a href="Fine.php">Fines</a></div>
		</div>

		<span style="display: inline; font-size:30px; cursor:pointer" onclick="openNav()">&#9776; Menu</span><br>

		<script>
		function openNav() {
		  document.getElementById("mySidenav").style.width = "300px";
		}

		function closeNav() {
		  document.getElementById("mySidenav").style.width = "0";
		}
		</script>
	</section>

</body>
</html>