<?php

require("../config.php");

$searchBySubQuery = "SELECT * FROM local_gov_areas";
$searchResult = $mysqli->query($searchBySubQuery);

while($row = $searchResult->fetch_assoc())
{
    echo $row['council_seat']."+";
}
?>
