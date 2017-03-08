<?php

$dbHost = "au-cdbr-azure-southeast-a.cloudapp.net";
$dbName = "anyoneconnectedDB";
$dbUser = "ba8319d0473c81";
$dbPass = "227b1939";

$mysqli = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
if($mysqli->connect_errno){
    printf("<strong>Error:</strong> (".$mysqli->connect_errno.")".$mysqli->connect_errno);
    exit();
}
/* else 
    echo "Well."

$mysqlConnection = mysql_connect($dbHost, $dbUser, $dbPass);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
    echo "Im good!";
} */
?>