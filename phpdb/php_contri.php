<?php

require("../config.php");
$choice = $_POST['ethnicity'];
$searchBySubQuery = "SELECT '$choice' AS II FROM contribution";
$searchResult = $mysqli->query($searchBySubQuery);

$row = $searchResult->fetch_assoc();
echo $searchResult;
//while($row = $searchResult->fetch_assoc())
//{
//    echo $row['II'];
//}
?>
