<?php 
require("../config.php");

$sql1 = "CREATE TABLE General_Practitioner
         (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            language VARCHAR(20),
            GP_Name VARCHAR(80),
            Surgery_Name VARCHAR(80),
            Address VARCHAR(80),
            Suburb VARCHAR(40),
            Postcode VARCHAR(10),
            Phone VARCHAR(40),
            Fax VARCHAR(40),
            Email VARCHAR(40),
            Latitude VARCHAR(40),
            Longitude VARCHAR(40)
         )";
         
  if ($mysqli->query($sql1) === TRUE){
      echo "Create Successfully";
  }
  else {
      echo "ERROR";
  }
  
  $sqli->close();

?>
