<?php 
require("../config.php");

$sql1 = "CREATE TABLE polygon
         (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            LGA_Name VARCHAR(30),
            polygon VARCHAR(10000)
         )";
         
  if ($mysqli->query($sql1) === TRUE){
      echo "Create Successfully";
  }
  else {
      echo "ERROR";
  }
  
  $sqli->close();

?>
 