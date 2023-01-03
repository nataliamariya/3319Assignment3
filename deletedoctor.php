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
	
	$deletedoctor = "'" . $_POST["deletedoc"]. "'";

	$checkdoc1 = "SELECT DISTINCT lastname FROM hospital, doctor WHERE licensenum=headdoc AND firstname=$deletedoctor";
	$resultdoc1 = mysqli_query($connection, $checkdoc1);
	$check1=mysqli_num_rows($resultdoc1);

	$checkdoc2 = "SELECT firstname FROM doctor WHERE licensenum IN (SELECT licensenum FROM looksafter) AND firstname=$deletedoctor";
	$resultdoc2 = mysqli_query($connection, $checkdoc2);
	$check2=mysqli_num_rows($resultdoc2);
    
	if ($check1>0 || $check2>0){
		echo "<h2>Error Deleting Doctor! Remember: Doctor cannot be treating any Patients or be a Head Doctor in order to delete</h2>" ;
	}
	else
    {
        $query = "DELETE FROM doctor WHERE firstname = $deletedoctor";
		$result = mysqli_query($connection, $query);
			if (!$result) { 
				die("Failed to delete.");
			}
			echo "<h2>Doctor has been deleted!</h2>";
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
