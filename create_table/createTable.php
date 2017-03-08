<?php 
require("../config.php");

$sql1 = "CREATE TABLE Community_center
         (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            category_number INT(2),
            category VARCHAR(43),
            sub_category VARCHAR(47),
            name VARCHAR(78),
            what VARCHAR(703),
            special_dietary_requirements_1 VARCHAR(10),
            special_dietary_requirements_2 VARCHAR(5),
            special_dietary_requirements_3 VARCHAR(11),
            who VARCHAR(359),
            suburb VARCHAR(39),
            enter_via VARCHAR(104),
            contact_person VARCHAR(59),
            phone VARCHAR(16),
            phone_2 VARCHAR(15),
            freecall VARCHAR(13),
            email VARCHAR(35),
            website VARCHAR(113),
            alternate_website VARCHAR(46),
            social_media VARCHAR(70),
            monday VARCHAR(87),
            tuesday VARCHAR(87),
            wednesday VARCHAR(87),
            thursday VARCHAR(87),
            friday VARCHAR(87),
            satarday VARCHAR(75),
            sunday VARCHAR(75),
            public_holidays VARCHAR(49),
            access VARCHAR(279),
            cost VARCHAR(133),
            tram_routes VARCHAR(164),
            nearest_train_station VARCHAR(177),
            bus_routes VARCHAR(112),
            car_parking VARCHAR(122),
            bicycle_parking VARCHAR(135),
            walking VARCHAR(137),
            address_1 VARCHAR(61),
            address_2 VARCHAR(45),
            latitude VARCHAR(190),
            longitude VARCHAR(90),
            geocoded_location VARCHAR(300)
         )";
         
  if ($mysqli->query($sql1) === TRUE){
      echo "Create Successfuly";
  }
  else {
      echo "ERROR";
  }
  
  $sqli->close();

?>
