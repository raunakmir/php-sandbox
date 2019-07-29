<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM userlist";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	    	<table class='table table-striped'>
	    		<tr>
	    			<th>Id</th>
	    			<th>Name</th>
	    			<th>Email</th>
	    		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	?>
	    			
		<?php
	    		echo "<tr>";
		        echo "<td>".$row["id"]."</td>"; 
		        echo "<td>".$row["name"]."</td>"; 
		        echo "<td>".$row["email"]."</td>";
				echo "</tr>";
		    }
		} else {
		    echo "<div class='alert alert-warning'>0 results</div>";
		}
		?>
	</table>
	<a href="test1.php" class="btn btn-primary">Back</a>
</div>
</body>
</html>