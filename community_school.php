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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="shortcut icon" href="images/gt_favicon.png">

        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/main.css">

        <script src="http://maps.googleapis.com/maps/api/js"></script>
    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top headroom" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Button for smallest screens -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Progressus HTML5 template"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="restaurant.php">Restaurant</a></li>
                                <li><a href="community_center.php">Community Center</a></li>
                                <li class="active"><a href="community_school.php">Community School</a></li>
                                <li><a href="searchGPs.php">GPs By Language</a></li>
                                <li><a href="data_visu.php">LGA Ethnicity</a></li>
                            </ul>
                        </li>
                        <li><a href="where-to-stay.php">Where To Stay</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div> 
        <!-- /.navbar -->

        <header id="head" class="secondary"></header>
<!--        <p style="height:40px">-->
        <!--  --------------------------------------------- Content Below ----------------------------------   -->       

        <script>
            var map;
            var infos = [];
            var position = [];
            var fullAddress = new Array();
            var content;
            var marker = [];
            var para;
            var globalVar;
            var currentLat;
            var currentLng;
            var destnLat;
            var destnLng;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;
            google.maps.event.addDomListener(window, 'load', initialize);
            function searchSchool() {
                map = new google.maps.Map(document.getElementById("schoolMap"), {
                    center: new google.maps.LatLng(-37.8142, 144.9632),
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var suburbInput = document.getElementById("suburb").value;
                str = document.getElementById("errorMessage");
                str.innerHTML = "";
                var pri;
                var sec;
                var pri_sec;
                var spec;
                var camp;
                var lang;
                var indep;
                var gov;
                var cath;
                if (document.getElementById("pri").checked) {
                    pri = "Primary";
                } else {
                    pri = "";
                }
                if (document.getElementById("sec").checked) {
                    sec = "Secondary";
                } else {
                    sec = "";
                }
                if (document.getElementById("pri_sec").checked) {
                    pri_sec = "Primary/Secondary Combined";
                } else {
                    pri_sec = "";
                }
                if (document.getElementById("spec").checked) {
                    spec = "Special";
                } else {
                    spec = "";
                }
                if (document.getElementById("camp").checked) {
                    camp = "Camp";
                } else {
                    camp = "";
                }
                if (document.getElementById("lang").checked) {
                    lang = "Language";
                } else {
                    lang = "";
                }

                if (document.getElementById("indep").checked) {
                    indep = "Independent";
                } else {
                    indep = "";
                }
                if (document.getElementById("gov").checked) {
                    gov = "Government";
                } else {
                    gov = "";
                }
                if (document.getElementById("cath").checked) {
                    cath = "Catholic";
                } else {
                    cath = "";
                }

                $.post('phpdb/php_school.php',
                        {pri: pri, sec: sec, pri_sec: pri_sec, spec: spec, camp: camp, lang: lang, indep: indep, gov: gov, cath: cath, selectedSuburb: suburbInput}, function (data) {
                    if (data !== "") {
                        if (data === "allnull") {
                            str = document.getElementById("errorMessage");
                            str.innerHTML = "Please input at least one field !";
                        } else {
                            // Extract data from database and assign value to different arrays;
                            var scls_rows = data.split("+");
                            var edu_sector = new Array();
                            var nameOfScls = new Array();
                            var typeOfScls = new Array();
                            var pricipal = new Array();
                            var addrOfScls = new Array();
                            var suburbOfScls = new Array();
                            var pcodeOfScls = new Array();
                            var phoneOfScls = new Array();
                            fullAddress = [];
                            for (var i = 0; i < scls_rows.length - 1; i++)
                            {
                                var scls_cols = scls_rows[i].split("|");
                                edu_sector[i] = scls_cols[0];
                                nameOfScls[i] = scls_cols[1];
                                typeOfScls[i] = scls_cols[2];
                                pricipal[i] = scls_cols[3];
                                addrOfScls[i] = scls_cols[4];
                                suburbOfScls[i] = scls_cols[5];
                                pcodeOfScls[i] = scls_cols[6];
                                phoneOfScls[i] = scls_cols[7];
                                fullAddress[i] = addrOfScls[i] + "," + suburbOfScls[i] + ",VIC," + pcodeOfScls[i];
                            }

                            // -------- Result table -------
//                            var innerTable = "";
//                            var es_upperTable = "";
//                            var st_upperTable = "";
//                            if (eduSectorInput === "") {
//                                es_upperTable = "All";
//                            } else
//                                es_upperTable = eduSectorInput;
//
//                            if (schoolTypeInput === "") {
//                                st_upperTable = "All";
//                            } else
//                                st_upperTable = schoolTypeInput;
//                            titleTab = document.getElementById("school_type");
//                            titleTab.innerHTML = "<div>Suburb:&nbsp;&nbsp;&nbsp;" + suburbInput + ";&nbsp;&nbsp;&nbsp;&nbsp;Education Sector:&nbsp;&nbsp;" + es_upperTable + ";&nbsp;&nbsp;&nbsp;&nbsp;School Type:&nbsp;&nbsp;" + st_upperTable + "</div><br>";
//                            for (var k = 0; k < scls_rows.length - 1; k++) {
//                                innerTable += "<tr><td>" + nameOfScls[k] + "</td><td>" + pricipal[k] + "</td><td>" + fullAddress[k] + "</td><td>" + phoneOfScls[k] + "</td></tr>";
//                            }
//                            resultTab = document.getElementById("resTab");
//                            resultTab.innerHTML = "<div class='table-responsive'><table class='table table-striped table-condensed table-hover'><thead><tr><td>School Name</td><td>Principal</td><td>Address</td><td>Contact Number</td></tr></thead><tbody>"
//                                    + innerTable + "</tbody></table></div>";

                            // ------- Markers on Map -------
                            var geocoder = new google.maps.Geocoder();
                            for (var q = 0; q < fullAddress.length; q++) { // Start of multiple markers for(;;) loop -------
                                // Geocode method makes an asynchonous call and uses a callback to handle the result
                                (function (s) {
                                    geocoder.geocode({'address': fullAddress[s]}, function (results) {
                                        map.setCenter(results[0].geometry.location);
                                        position[s] = results[0].geometry.location;
                                        marker[s] = new google.maps.Marker({
                                            map: map,
                                            position: position[s]
                                        });
                                        content = "<div>School Name:&nbsp;&nbsp;&nbsp;" + nameOfScls[s]
                                                + "</div><br><div>Principal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + pricipal[s]
                                                + "</div><br><div>Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + fullAddress[s]
                                                + "</div><br><div>Contact No.:&nbsp;" + phoneOfScls[s]
                                                + "</div><br><div><button onclick='displayRoute()' data-toggle='modal' href='#myModal'>Get Direction</button></div>";
                                        para = results[0].geometry.location;
                                        var infowindow = new google.maps.InfoWindow();
                                        google.maps.event.addListener(marker[s], 'click', (function (marker, content, infowindow, para) {
                                            return function () {
                                                closeInfos();
                                                toFloat(para);
                                                infowindow.setContent(content);
                                                infowindow.open(map, marker);
                                                infos[0] = infowindow;
                                            };
                                        })(marker[s], content, infowindow, para));
                                    });
                                })(q);
                            } // End of multiple markers for(;;) loop -------
                            //Let map fit all of markers
//                            var bounds = new google.maps.LatLngBounds();
//                            for (var g; g < marker.length; g++) {
//                                bounds.extend(marker[g].getPosition());
//                            }
//                            map.fitBounds(bounds);
                            // Function for closing info window
                            // This function is to close the info window of a clicked marker when user clicks other marker
                            function closeInfos() {
                                if (infos.length > 0) {
                                    infos[0].set("marker", null);
                                    infos[0].close();
                                    infos.length = 0;
                                }
                            }
                            function toFloat(param) {
                                globalVar = param;
                                var str = globalVar.toString();
                                str = str.replace(/\(/, "");
                                str = str.replace(/\)/, "");
                                var strArr = str.split(",");
                                var lati = trim(strArr[0]);
                                var longi = trim(strArr[1]);
                                destnLat = parseFloat(lati);
                                destnLng = parseFloat(longi);
                            }
                        }
                    } else
                    {
                        str = document.getElementById("errorMessage");
                        str.innerHTML = "Apologise! No matching results.";
                    }

                });
            }
            //function for showing first map
            function initialize() {
                var mapProp = {
                    center: new google.maps.LatLng(-37.8142, 144.9632),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("schoolMap"), mapProp);
                /* ----------- get current location ----------*/
                var infoWindow = new google.maps.InfoWindow({map: map});
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(pos);
                        currentLat = pos.lat;
                        currentLng = pos.lng;
                        //A marker show current location
                        var currMarker = new google.maps.Marker({
                            position: pos,
                            map: map
                        });
                        infoWindow.setContent("Current Location");
                        infoWindow.open(map, currMarker);
                        infos[0] = infoWindow;
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                /* ----------- get current location below ----*/
            }
            //get current location
            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
            }
            // display route for myself
            function displayRoute() {
                //New map displayed on modal
                var map2Prop = {
                    center: new google.maps.LatLng(-37.8142, 144.9632),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var mapRouting = new google.maps.Map(document.getElementById("maprouting"), map2Prop);
                $('#myModal').on('shown.bs.modal', function () {
                    displayRoute();
                });
                /* ----------- for routing ---------- */
                directionsDisplay.setMap(mapRouting);
                directionsDisplay.setPanel(document.getElementById("directions"));
                calculateAndDisplayRoute(directionsService, directionsDisplay);
                document.getElementById('mode').addEventListener('change', function () {
                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                });
                /* ----------- for routing below----- */
            }
            // Direction
            function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                var selectedMode = document.getElementById('mode').value;
                directionsService.route({
                    origin: {lat: currentLat, lng: currentLng},
                    destination: {lat: destnLat, lng: destnLng},
                    travelMode: google.maps.TravelMode[selectedMode]
                }, function (response, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    } else {
                        alert("Directions request failed due to " + status);
                    }
                });
            }

            //Remove space
            function trim(str) {
                return str.replace(/(^\s+)|(\s+$)/g, "");
            }

            window.addEventListener("keypress", function () {
                var keyCode = event.keyCode;
                if (keyCode === 13)
                    searchSchool();
            });

        </script>
        <div class="container">
            <div class="jumbotron">
                <h1>Community School</h1>
                <p>
                    Want to know about the schools available in the different suburbs? Easily search by education sector or school type with your suburb.
                </p>
            </div>
            <!--        </div>
                    <div class="container">-->
            <div class="col-sm-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="control-label col-sm-2"><label class="control-label">Suburb:</label></div>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="suburb" placeholder="Enter suburb">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Education Sector:</label>
                        <div class="col-sm-10">          
                            <label class="checkbox-inline"><input type="checkbox" id="indep" value="Independent">Independent</label>
                            <label class="checkbox-inline"><input type="checkbox" id="gov" value="Government">Government</label>
                            <label class="checkbox-inline"><input type="checkbox" id="cath" value="Catholic">Catholic</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">School Type:</label>
                        <div class="col-sm-10">          
                            <label class="checkbox-inline"><input type="checkbox" id="pri" value="Primary">Primary</label>
                            <label class="checkbox-inline"><input type="checkbox" id="sec" value="Secondary">Secondary</label>
                            <label class="checkbox-inline"><input type="checkbox" id="pri_sec" value="Primary/Secondary Combined">Primary/Secondary Combined</label>
                            <label class="checkbox-inline"><input type="checkbox" id="spec" value="Special">Special</label>
                            <label class="checkbox-inline"><input type="checkbox" id="lang" value="Language">Language</label>
                            <label class="checkbox-inline"><input type="checkbox" id="camp" value="Camp">Camp</label>
                        </div>
                    </div>
                    <div style="text-align:center"><span id="errorMessage" style="color: red"></span></div>
                    <div class="form-group">
                        <p style="height:40px">
                        <div class="text-center"><button type="button" id="searchbtn" class="btn btn-primary btn-lg" onclick="searchSchool()">Search</button></div>
                        <p style="height:40px">
                    </div>
                </form>
            </div>
            <div id="schoolMap" style="width:100%;height:400px;"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Routing Information</h4>
                    </div>
                    <div class="modal-body">
                        <!--                        <div class="container">-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div id="maprouting" style="height:400px;"></div>
                                </div>
                                <div class="col-sm-6" style="height:400px; overflow-y: scroll">
                                    <div id="directions">
                                        <b>Mode of Travel: </b>
                                        <select id="mode">
                                            <option value="DRIVING">Driving</option>
                                            <option value="WALKING">Walking</option>
                                            <option value="BICYCLING">Bicycling</option>
                                            <option value="TRANSIT">Transit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!--  --------------------------------------------- Content Above ----------------------------------   -->       
        <hr class="featurette-divider">
        <div class="container">
            <footer>
                <p class="pull-right"><a href="data_source.php" style="margin-right: 20px">Date Source</a><a href="#">Back to top</a></p>
                <p>&copy; 2016 De Coders, Monash University</p>
            </footer>
        </div>
        <!-- Javascript files should be linked at bottom of the page  -->
        <script src="js/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js"></script>


    </body>
</html>
