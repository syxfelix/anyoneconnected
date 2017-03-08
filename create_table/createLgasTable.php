<?php 
require("../config.php");

$sql1 = "CREATE TABLE local_gov_areas
         (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            lgas_name VARCHAR(30),
            council_seat VARCHAR(30)
         )";
         
  if ($mysqli->query($sql1) === TRUE){
      echo "Create Successfully";
  }
  else {
      echo "ERROR";
  }
  
  $sqli->close();

?>
