<!DOCTYPE html>
<html>
<head>
<title>Php Lab: Index</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="style.css">
<!-- jQuery library -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar -->
	<div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
						aria-expanded="false">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><span
						class="glyphicon glyphicon-home"></span></a>
				</div>


				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">Empty Link 1<span class="sr-only">(current)</span></a></li>
						<li><a href="#">Empty Link 2</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Dropdown toggle<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Dropdown link 1</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Dropdown link 2</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Dropdown Link 3</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Dropdown Link 4</a></li>
							</ul></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login_page.php">Login</a></li>
						<li><a href="about_us.html">Empty Link 3</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Contact Us <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="mailto:name@AwesomeUniversity.com">Email</a></li>
								<li><a href="#">Phone</a></li>
								<li><a href="#">Fax</a></li>

							</ul></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</div>
	<!-- Body div -->
	<div class="container">
		<div class="jumbotron">
			<p>Current shopping cart:</p>
			<table>
				<?php
				    //Error reporting
				    ini_set('display_errors', 1); 
				    error_reporting(-1);
				    // Enter username and password
				    $servername = "127.0.0.1";
				    $username = "root";
				    $password = "root";
				    $dbname = "ShoppingList";
                    
				    // Create connection
				    $conn = new mysqli($servername, $username, $password, $dbname);
				    // Check connection
				    if ($conn->connect_error) {
				        die("Connection failed: " . $conn->connect_error);
			        } 
			         
			        $sql = "SELECT * FROM list";
			        $result = $conn->query($sql);
			        if ($result->num_rows > 0) {
			            // output data of each row
			            while($row = $result->fetch_assoc()) {
			                echo "Item: " . $row["Item_Name"]. " - Price: " . $row["Item_Price"]. " - Count: " . $row["Item_Count"]. "<br>";
			            }
			        } else {
			            echo "0 results";
			        }
			        $conn->close();

		          ?>

			</table>
			<p>Insert item </p>
			<form action="insert.php" method="post">
    			<p>
        			<label for="item">Item:</label>
        			<input type="text" name="item" id="item">
    			</p>
    			<p>
        			<label for="price">Price:</label>
        			<input type="text" name="price" id="price">
    			</p>
    			<p>
        			<label for="count">Count:</label>
        			<input type="text" name="count" id="count">
    			</p>
    			<input type="submit" value="Submit">
			</form>
			<p>Delete Item </p>
			<form action="delete.php" method="post">
    			<p>
        			<label for="item">Item:</label>
        			<input type="text" name="item" id="item">
    			</p>
    			<input type="submit" value="Submit">
			</form>
		</div>
	</div>

</body>
</html>


