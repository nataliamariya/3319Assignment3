<!-- 
gets doctors data
-->
<!DOCTYPE html>
<html>
<head>
	<title>Display Doctors by Speciality</title>

        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
      <style>
        h1{text-align:center;}
		h4{text-align:center;}
		form{text-align: center;}
      </style>
	
    <?php //connect database
	include "connecttodb.php";
	?>

	<h1>Display Doctors by Speciality</h1>

	<table>

    <!-- create table headers -->
		<tr>
			<th>License Number</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>License Date</th>
            <th>Birthdate</th>
            <th>Current Hospital</th>
            <th>Speciality</th>
		<tr>

		<?php
		$SelectSpec = $_POST["pickspec"];
        echo "<h4>The data is currently displaying all doctors with speciality " . $SelectSpec . "</h4><br>";
		$query = "SELECT * FROM doctor WHERE speciality = '$SelectSpec'";
		$result = mysqli_query($connection, $query);
		if (!$result) { 
            die("databases query failed.");
        }
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row[licensenum] . "</td><td>" . $row[firstname] . "</td><td>" . $row[lastname] . "</td><td>" . $row[licensedate] . "</td><td>" . $row[birthdate] . "</td><td>" . $row[hosworksat] . "</td><td>" . $row[speciality] . "</td></tr>";
		}
		mysqli_free_result($result);
		?>
	</table>


	<form action="index.php" method="post">
		<input type="submit" value="Return to Homepage">
	</form>
</body>
</html>
