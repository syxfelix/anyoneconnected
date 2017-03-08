<?php

require("../config.php");
$choice = $_POST['ethnicity'];
$searchBySubQuery = "SELECT * FROM contribution";
$searchResult = $mysqli->query($searchBySubQuery);

while($row = $searchResult->fetch_assoc())
{
    echo $row['LGA_Name']."|".$row[$choice]."+";
}

?>