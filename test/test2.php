<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script>
            function show(){
                var str = "147.37334,-37.100082,0 147.380527,-37.098739,0 147.3804908077189,-37.09825387186692,0 ";
                alert(str);
                var eachPoint = str.split(",0 ");
                alert(eachPoint.length);
                var latitude = [];
                var longitude = [];
                for(var i = 0; i < eachPoint.length - 1; i++){
                    var rece = eachPoint[i].split(",");
                    longitude[i] = rece[0];
                    latitude[i] = rece[1];
                }
                alert(eachPoint[0] + "=?||" + longitude[0]+","+latitude[0]);
            }
        </script>
        <div>
            <button type="button" onclick="show()">ALERT</button>
        </div>
    </body>
</html>
