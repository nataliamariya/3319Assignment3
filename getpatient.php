<?php
$query = "SELECT * FROM patient";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='" . $row[ohipnum] . "'> " . $row[firstname] . " " . $row[lastname] . "</option>";
}
mysqli_free_result($result);
?>
