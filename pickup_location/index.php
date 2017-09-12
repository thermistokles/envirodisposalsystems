<?php
require_once 'connection.php';

if (!empty($_POST)) {
	$sql="SELECT * FROM disposal_location WHERE pin='".$_POST['pin']."'";
	$mysqli_result=$conn->query($sql);
	$num_rows = $mysqli_result->num_rows;
	if ($num_rows>0) {
		$row=$mysqli_result->fetch_assoc();
		echo "the pin " .$row["pin"]. "indicates the area " .$row["name"]. ". Please use the map to point to the exact location!";
		}
	else{
		echo "does not exist";
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
	enter the pin:<input type="text" name="pin"></input>
	<br>
	<input type="submit" value="location"></input>

	<!--API script here-->
</form>
</body>
</html>