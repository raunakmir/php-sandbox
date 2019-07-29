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

	$msg = '';
	$msgClass = '';

	if(isset($_POST['subbtn'])) {
		$name = $_POST['fname'];
		$email = $_POST['uemail'];

		if(!empty($name))
		{
			if(!empty($email)) {
				$msg = 'User Registered ';
				$msgClass = 'success';

				$sql = "INSERT INTO userlist ( name, email) VALUES ('$name', '$email')";
				mysqli_query($conn, $sql);
			}
			else {
				$msg = 'Registration Failed';
				$msgClass = 'danger';
			}
		}
		else {
				$msg = 'Registration Failed';
				$msgClass = 'danger';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="jumbotron">
		<h2 align="center">Registration Form</h2>
	</div>
	<div class="alert alert-<?php echo $msgClass; ?>">
		<p><?php echo $msg; ?></p>
	</div>
	<div class="container">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="fname">Name:</label>
				<input type="text" name="fname" id="fname" placeholder="Enter full name" class="form-control">
			</div>
			<div class="form-group">
				<label for="uemail">Email:</label>
				<input type="email" name="uemail" id="uemail" placeholder="Enter user email" class="form-control">
			</div>
				<input type="submit" name="subbtn" class="btn btn-info" value="Register">
				<a href="test2.php" class="btn btn-warning">Show User List</a>
		</form>
	</div>
</body>
</html>