<?php

require("config.php");
//$sub_choice = $_POST['selectedSuburb'];
//$lang_choice = $_POST['selectedLang'];
$hell = $_POST['testvalue'];

$searchBySubQuery = "SELECT * FROM polygon";
$searchResult = $mysqli->query($searchBySubQuery);
while ($row = $searchResult->fetch_assoc()) {
    echo $row['LGA_Name'] . "|" . $row['polygon'] . "+";
}
?>
