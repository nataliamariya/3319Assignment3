<?php
$query = "SELECT * FROM hospital";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='" . $row[hoscode] . "'>"  . $row[hosname] . " " . $row[hoscode] . "</option>";
}
mysqli_free_result($result);
?>
