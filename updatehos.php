<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Add Doctor</title>
</head>
<body>
	<?php 
	include "connecttodb.php";

	$hoscode = "'" . $_POST["hosps"] . "'";
	$numofbed = "'" . $_POST["hosbed"] . "'";

	$check = "SELECT * FROM hospital WHERE hoscode = $hoscode";
	$result = mysqli_query($connection, $check);
	$check2=mysqli_num_rows($result);

	if ($check2<1){
		echo "<h2>No hospital found</h2>" ;
	}
	else
    {
 		$query = "UPDATE hospital SET numofbed = $numofbed WHERE hoscode = $hoscode ";
		$result = mysqli_query($connection, $query);
			if (!$result) { 
				die("Failed to update database");
			}
			echo "<h2>Hospital Beds have been updated!</h2>";
	}

	?>

	<form action="index.php" method="post">
		<input type="submit" value="Return to Homepage">
	</form>
</body>
</html>
