<?php 
require("../config.php");

$sql1 = "CREATE TABLE Community_school
         (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Education_Sector VARCHAR(20),
            School_Name VARCHAR(80),
            School_Type VARCHAR(30),
            Principal VARCHAR(30),
            Address VARCHAR(50),
            Suburb VARCHAR(30),
            Postcode VARCHAR(10),
            Phone VARCHAR(20),
            LGA_Name VARCHAR(30)
         )";
         
  if ($mysqli->query($sql1) === TRUE){
      echo "Create Successfully";
  }
  else {
      echo "ERROR";
  }
  
  $sqli->close();

?>
 