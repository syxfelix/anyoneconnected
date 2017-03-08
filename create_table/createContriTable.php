<?php

require("../config.php");

$sql1 = "CREATE TABLE Contribution
         (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            LGA_Name VARCHAR(30),
            England VARCHAR(30),
            India VARCHAR(30),
            China VARCHAR(30),
            NewZealand VARCHAR(30),
            Italy VARCHAR(30),
            Malaysia VARCHAR(30),
            SouthAfrica VARCHAR(30),
            Indonesia VARCHAR(30),
            Bangladesh VARCHAR(30),
            Canada VARCHAR(30),
            Philippines VARCHAR(30),
            Malta VARCHAR(30),
            Iraq VARCHAR(30),
            Afghanistan VARCHAR(30),
            Sovakia VARCHAR(30),
            Belarus VARCHAR(30),
            Singapore VARCHAR(30)
         )";

if ($mysqli->query($sql1) === TRUE) {
    echo "Create Successfully";
} else {
    echo "ERROR";
}

$sqli->close();
?>