<?php
$query = "SELECT firstname, lastname FROM doctor";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) {
	echo "<option value='" . $row[firstname] . "'>Dr. " . $row[firstname] . " " . $row[lastname] . "</option>";
}
mysqli_free_result($result);
?>
