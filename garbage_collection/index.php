<?php
require_once 'connection.php';

if (!empty($_POST)) {
	$sql="SELECT * FROM user WHERE pin='".$_POST['pin']."'";
	$check=$conn->query($sql);
	if ($check->num_rows>0) {
		die('you seem to exist in our database. Please visit our location page for collection of garbage.');
		}
	else{
		echo "does not exist";

		$firstname=filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
		$lastname=filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['phone_no'],FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['pin'],FILTER_SANITIZE_STRING);

		if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
			echo "valid email";
		}
		else{
			die('invalid email');
		}
		$sql="INSERT INTO user(id, first_name, last_name, address, pin, email, phone_no) VALUES(DEFAULT,'" .$_POST['first_name']. "','" .$_POST['last_name']. "','" .$_POST['address']. "','".$_POST['pin']."','".$_POST['email']."','" .$_POST['phone_no']. "')";
		echo $sql;

		if ($conn->query($sql) === TRUE) {
			echo "we welcome our new customer. Please visit our location page to pinpoint your exact location for collection of garbage.";
		}
		else{
			echo "error";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="index.php" method="POST">
	first name<input type="text" name="first_name">
	<br>
	last name<input type="text" name="last_name">
	<br>
	address<input type="text" name="address">
	<br>
	pincode<input type="text" name="pin">
	<br>
	email<input type="email" name="email">
	<br>
	phone_no<input type="text" name="phone_no">
	<br>
	<input type="submit" value="Go">
</form>
</body>
</html>