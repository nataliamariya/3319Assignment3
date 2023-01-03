<?php
$query = "select distinct speciality from doctor";
$result = mysqli_query($connection,$query);
if (!$result) {
die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
echo "<option value=". $row[speciality] . ">" . $row[speciality] . "</option>";
}
mysqli_free_result($result);
?>
