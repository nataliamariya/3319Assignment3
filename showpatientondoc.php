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
			<th>First Name</th>
			<th>Last Name</th>
			<th>OHIP Number</th>
		<tr>
  
	<?php 
	include "connecttodb.php";

	$firstname = "'" . $_POST["deletedoc"] . "'";

	$query = "SELECT patient.firstname, patient.lastname, patient.ohipnum FROM patient,looksafter, doctor 
    WHERE doctor.firstname = $firstname AND doctor.licensenum=looksafter.licensenum AND looksafter.ohipnum=patient.ohipnum;";
	$result = mysqli_query($connection, $query);
		if (!$result) { 
            die("The doctor selected is not treating any patients.");
            echo"The doctor selected is not treating any patients";
        }
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row[firstname] . "</td><td>" . $row[lastname] . "</td><td>" . $row[ohipnum] . "</td></tr>";
        }
		mysqli_free_result($result);
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
