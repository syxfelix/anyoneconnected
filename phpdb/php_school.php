<?php

require("../config.php");

$suburb = $_POST['selectedSuburb'];

$primary = $_POST['pri'];
$second = $_POST['sec'];
$priAsec = $_POST['pri_sec'];
$special = $_POST['spec'];
$camp = $_POST['camp'];
$language = $_POST['lang'];

$independent = $_POST['indep'];
$government = $_POST['gov'];
$catholic = $_POST['cath'];

if ($suburb . $primary . $second . $priAsec . $special . $camp . $language . $independent . $government . $catholic == "") {
    echo "allnull";
} else {
    if ($suburb == "") {
        if ($primary . $second . $priAsec . $special . $camp . $language == "") { //Search By Edu sector which is not null
            $searchBySubQuery = "SELECT * FROM community_school s WHERE s.Education_Sector IN ('$independent','$government','$catholic')";
        } else {
            if ($independent . $government . $catholic == "") { //Search By school type
                $searchBySubQuery = "SELECT * FROM community_school s WHERE s.School_Type IN ('$primary','$second','$priAsec','$special','$camp','$language')";
            } else { //Edu Sector and School Type are not null, search by ES and ST
                $searchBySubQuery = "SELECT * FROM community_school s WHERE s.Education_Sector IN ('$independent','$government','$catholic') AND s.School_Type IN ('$primary','$second','$priAsec','$special','$camp','$language')";
            }
        }
    } else { //suburb is not null
        if ($primary . $second . $priAsec . $special . $camp . $language == "") {
            if ($independent . $government . $catholic == "") { //Search by Suburb
                $searchBySubQuery = "SELECT * FROM community_school s WHERE s.Suburb = '$suburb'";
            } else { //Search by Suburb and Edu Sector
                $searchBySubQuery = "SELECT * FROM community_school s WHERE s.Suburb = '$suburb' AND s.Education_Sector IN ('$independent','$government','$catholic')";
            }
        } else { //School Type is not null , Suburb is not null
            if ($independent . $government . $catholic == "") { //Search by Suburb and School Type
                $searchBySubQuery = "SELECT * FROM community_school s WHERE s.Suburb = '$suburb' AND s.School_Type IN ('$primary','$second','$priAsec','$special','$camp','$language')";
            } else { //Search by all three fields
                $searchBySubQuery = "SELECT * FROM community_school s WHERE s.Suburb = '$suburb' AND s.Education_Sector IN ('$independent','$government','$catholic') AND s.School_Type IN ('$primary','$second','$priAsec','$special','$camp','$language')";
            }
        }
    }
    $searchResult = $mysqli->query($searchBySubQuery);
    while ($row = $searchResult->fetch_assoc()) {
        echo $row['Education_Sector'] . "|" . $row['School_Name'] . "|" . $row['School_Type'] . "|" . $row['Principal'] . "|" . $row['Address'] . "|" . $row['Suburb'] . "|" . $row['Postcode'] . "|" . $row['Phone'] . "+";
    }
}
?>
