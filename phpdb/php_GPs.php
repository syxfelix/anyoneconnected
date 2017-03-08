<?php

require("../config.php");
$sub_choice = $_POST['selectedSuburb'];
$lang_choice = $_POST['selectedLang'];

if ($sub_choice == "") { 
    if ($lang_choice == "") { //Both suburb and language are null;
        $searchBySubQuery = "SELECT language, GP_name, Surgery_Name, Address, Suburb, Phone, Latitude, Longitude FROM general_practitioner";
        $searchResult = $mysqli->query($searchBySubQuery);
        while ($row = $searchResult->fetch_assoc()) {
            echo $row['GP_name'] . "|" . $row['Surgery_Name'] . "|" . $row['language']  . "|" . $row['Address'] . "|" . $row['Suburb'] . "|" . $row['Phone'] . "|" . $row['Latitude'] . "|" . $row['Longitude'] . "+";
        }
    } else { //Search by Language;
        $searchBySubQuery = "SELECT language, GP_name, Surgery_Name, Address, Suburb, Phone, Latitude, Longitude FROM general_practitioner g WHERE g.Language = '$lang_choice'";
        $searchResult = $mysqli->query($searchBySubQuery);
        while ($row = $searchResult->fetch_assoc()) {
            echo $row['GP_name'] . "|" . $row['Surgery_Name'] . "|" . $row['language']  . "|" . $row['Address'] . "|" . $row['Suburb'] . "|" . $row['Phone'] . "|" . $row['Latitude'] . "|" . $row['Longitude'] . "+";
        }
    }
} else {
    if ($lang_choice == "") { //Search by Suburb;
        $searchBySubQuery = "SELECT language, GP_name, Surgery_Name, Address, Suburb, Phone, Latitude, Longitude FROM general_practitioner g WHERE g.Suburb = '$sub_choice'";
        $searchResult = $mysqli->query($searchBySubQuery);
        while ($row = $searchResult->fetch_assoc()) {
            echo $row['GP_name'] . "|" . $row['Surgery_Name'] . "|" . $row['language']  . "|" . $row['Address'] . "|" . $row['Suburb'] . "|" . $row['Phone'] . "|" . $row['Latitude'] . "|" . $row['Longitude'] . "+";
        }
    } else { //Search by Suburb and Language;
        $searchBySubQuery = "SELECT language, GP_name, Surgery_Name, Address, Suburb, Phone, Latitude, Longitude FROM general_practitioner g WHERE g.Suburb = '$sub_choice' AND g.Language = '$lang_choice'";
        $searchResult = $mysqli->query($searchBySubQuery);
        while ($row = $searchResult->fetch_assoc()) {
            echo $row['GP_name'] . "|" . $row['Surgery_Name'] . "|" . $row['language']  . "|" . $row['Address'] . "|" . $row['Suburb'] . "|" . $row['Phone'] . "|" . $row['Latitude'] . "|" . $row['Longitude'] . "+";
        }
    }
}


?>
