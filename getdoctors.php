<!-- 
gets doctors data
-->
<!DOCTYPE html>
<html>
<head>
	<title>List Doctors</title>

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

	<h1>Listing all Doctors and Data</h1>
	<table>

    <!-- create table headers -->
		<tr>
			<th>License Number | </th>
			<th>First Name | </th>
			<th>Last Name | </th>
			<th>License Date | </th>
            <th>Birthdate | </th>
            <th>Current Hospital | </th>
            <th>Speciality</th>
		<tr>

		<?php
		$SortDoctor = $_POST["SortDoctor"];
		$OrderDoctor = $_POST["OrderDoctor"];
        echo "<h4>The Doctor Data is currently being sorted by " . $SortDoctor . " in " . $OrderDoctor . " order.</h4><br>";
		$query = "SELECT * FROM doctor ORDER BY $SortDoctor $OrderDoctor";
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
          
                            
  <?php
  		mysqli_close($connection);
  ?>  
</body>
</html>
