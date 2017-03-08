
<!DOCTYPE html>
<!--
  Copyright 2011 Google Inc. All Rights Reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">

        <title>Fusion Tables Layer Example: Dynamic Info Windows</title>

        <link href="/apis/fusiontables/docs/samples/style/default.css"
              rel="stylesheet" type="text/css">
        <script type="text/javascript"
        src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <script type="text/javascript">
            function initialize() {
                var map = new google.maps.Map(document.getElementById('map-canvas'), {
                    center: new google.maps.LatLng(-36.6003559251473, 145.4691805),
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var layer = new google.maps.FusionTablesLayer({
                    query: {
                        select: "col2",
                        from: "10FBs7CRHzPT-PFcD1dbNMzUgg9R9t9yfYKJF-idL",
                        where: ""
                    },
                    styles: [{
                            where: "'contribution' < 40",
                            polygonOptions: {
                                fillColor: "#FF6600",
                                strokeColor: "#FFFFFF",
                                strokeWeight: 1
                            }
                        }, {
                            where: "'contribution' >= 40",
                            polygonOptions: {
                                fillColor: "#00CCCC",
                                strokeColor: "#FFFFFF",
                                strokeWeight: 1
                            }
                        }],
//                    options: {
//                        styleId: 2,
//                        templateId: 2
//                    },
                    map: map
                });

                google.maps.event.addListener(layer, 'click', function (e) {

                    // Change the content of the InfoWindow
                    e.infoWindowHtml = e.row['LGA Name'].value + "<br>";
                });
            }



            google.maps.event.addDomListener(window, 'load', initialize);

        </script>
    </head>
    <body>
        <div id="map-canvas" style="width: 800px;height: 600px"></div>
    </body>
</html>