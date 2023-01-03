<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Show Patient Data by Doctor</title>
</head>
<body>
  	  <style>
        h1{text-align:center;}
		h4{text-align:center;}
		form{text-align: center;}
      </style>
  	<h1>Listing all Doctors and Data</h1>
	<table>

		<tr>
			<th>Hospital Name</th>
			<th>City</th>
			<th>Province</th>
			<th>numofbed</th>
			<th>Head Doctor</th>
			<th>Doctor First Name</th>
        	<th>Doctor Last Name</th>
		<tr>
  
	<?php 
	include "connecttodb.php";

	$hoscode = "'" . $_POST["hosps"] . "'";


	$query2 = "SELECT hospital.hosname, hospital.city, hospital.prov, hospital.numofbed, hospital.headdoc, doctor.firstname, doctor.lastname 
    FROM hospital, doctor 
    WHERE hospital.hoscode = $hoscode AND doctor.hosworksat= $hoscode";
	$result2 = mysqli_query($connection, $query2);
		if (!$result2) { 
            die("Database query failed.");
        }
		while ($row = mysqli_fetch_assoc($result2)) {
			echo "<tr><td>" . $row[hosname] . "</td><td>" . $row[city] . "</td><td>" . $row[prov] . "</td><td>" . $row[numofbed] . "</td><td>" . $row[headdoc] ."</td><td>" . $row[firstname] ."</td><td>" . $row[lastname] ."</td></tr>";
        }
		mysqli_free_result($result2);
		?>
	</table>

	<form action="index.php" method="post">
		<input type="submit" value="Return to Homepage">
	</form>
          
                            
  <?php
  		mysqli_close($connection);
  ?>  
</body>
</html>
