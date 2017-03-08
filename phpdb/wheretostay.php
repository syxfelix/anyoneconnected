<?php

require("../config.php");

$ethBool = $_POST['ethYes'];
$nation = $_POST['ethni'];

$searchBySubQuery = "SELECT * FROM contribution WHERE $nation > 10 ORDER BY $nation DESC";
$searchResult = $mysqli->query($searchBySubQuery);
while($row = $searchResult->fetch_assoc())
{
    echo $row['LGA_Name']."+";
}
?>

