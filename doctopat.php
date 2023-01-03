<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Delete Doctor</title>
</head>
<body>
	<?php 
	include "connecttodb.php";
	
	$licensenum = "'" . $_POST["assigndoc"]. "'";
	$ohipnum = "'" . $_POST["selectpat"]. "'";

	$checkexist = "SELECT licensenum FROM looksafter WHERE licensenum=$licensenum AND ohipnum=$ohipnum";
	$resultexist = mysqli_query($connection, $checkexist);
	$check=mysqli_num_rows($resultexist);
    
	if ($check>0){
		echo "<h2>Error Assigning Doctor: Doctor already assigned to this patient</h2>";
	}
	else
    {
      	$query = "INSERT INTO looksafter VALUES ($licensenum, $ohipnum)";
		$result = mysqli_query($connection, $query);
			if (!$result) { 
				die("Failed to insert.");
			}
			echo "<h2>Doctor has been assigned to Patient!</h2>";
	}

	?>

	<form action="index.php" method="post">
		<input type="submit" value="Return To Homepage">
	</form>
      
                        
  <?php
  		mysqli_close($connection);
  ?>  
</body>
</html>
