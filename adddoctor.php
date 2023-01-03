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

	$licensenum = "'" . $_POST["newlicensenum"] . "'";
	$firstname = "'" . $_POST["newfirstname"] . "'";
	$lastname = "'" . $_POST["newlastname"] . "'";
	$licensedate = "'" . $_POST["newlicensedate"] . "'";
    $birthdate = "'" . $_POST["newbirthdate"] . "'";
	$hosworksat = "'" . $_POST["newhosworksat"] . "'";
	$speciality = "'" . $_POST["newspeciality"] . "'";


	$checklic = "SELECT licensenum FROM doctor WHERE licensenum = $licensenum";
	$resultlic = mysqli_query($connection, $checklic);
	$check=mysqli_num_rows($resultlic);
    
    $checkhos = "SELECT DISTINCT hosworksat FROM doctor JOIN hospital ON doctor.hosworksat=hospital.hoscode AND hosworksat = $hosworksat";
	$resulthos = mysqli_query($connection, $checkhos);
    $check2 = mysqli_num_rows($resulthos);

	if ($check>0){
		echo "<h2>Error adding Doctor: Doctor License Number " . $licensenum . " Already Exists. <br>Enter Unique License Number</h2>" ;
	}
	else if($check2<1)
    {
		echo "<h2>Error: Hospital Code " . $hosworksat . " Does Not Exist." ;
		$query = "INSERT INTO doctor VALUES ($licensenum, $firstname, $lastname, $licensedate, $birthdate, NULL, $speciality)";
		$result = mysqli_query($connection, $query);
      
	  if (!$result) { 
	 		die("Failed to insert into database");
	  }
			echo "<h2>New doctor has been added!</h2>";
    }
	else
    {
 		$query = "INSERT INTO doctor VALUES ($licensenum, $firstname, $lastname, $licensedate, $birthdate, $hosworksat, $speciality)";
		$result = mysqli_query($connection, $query);
			if (!$result) { 
				die("Failed to insert into database");
			}
			echo "<h2>New doctor has been added!</h2>";
	}

	?>

	<form action="index.php" method="post">
		<input type="submit" value="Return to Homepage">
	</form>
      
                        
  <?php
  		mysqli_close($connection);
  ?>  
</body>
</html>

