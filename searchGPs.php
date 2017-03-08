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
                                <li><a href="community_school.php">Community School</a></li>
                                <li class="active"><a href="searchGPs.php">GPs By Language</a></li>
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
        <p style="height:40px">
            <!--  --------------------------------------------- Content Below ----------------------------------   -->      
            <script>
                var suburbInput;
                var languageInput;
                var map;
                var infos = [];
                var currentLat;
                var currentLng;
                var destnLat;
                var destnLng;
                var directionsDisplay = new google.maps.DirectionsRenderer;
                var directionsService = new google.maps.DirectionsService;
                google.maps.event.addDomListener(window, 'load', initialize);
                window.addEventListener("keypress", function () {
                    var keyCode = event.keyCode;
                    if (keyCode === 13)
                        showGPs();
                });
                //Main function    
                function showGPs() {
                    map = new google.maps.Map(document.getElementById("gPMap"), {
                        center: new google.maps.LatLng(-37.8142, 144.9632),
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    str = document.getElementById("errorMessage");
                    str.innerHTML = "";
                    str2 = document.getElementById("hints");
                    str2.innerHTML = "";
                    suburbInput = document.getElementById("suburbInput").value;
                    languageInput = document.getElementById("languageInput").value;
                    suburbInput = trim(suburbInput);
                    languageInput = trim(languageInput);
                    $.post('phpdb/php_GPs.php', {selectedSuburb: suburbInput, selectedLang: languageInput}, function (data) {
                        if (data !== "") {
                            var gps_rows = data.split("+");
                            var nameOfGPs = new Array();
                            var nameOfSurgery = new Array();
                            var langOfGPs = new Array();
                            var addrOfGPs = new Array();
                            var suburbOfGPs = new Array();
                            var phoneOfGPs = new Array();
                            var latiOfGPs = new Array();
                            var longiOfGPs = new Array();
                            var marker = [];
                            for (var i = 0; i < gps_rows.length - 1; i++)
                            {
                                var gps_cols = gps_rows[i].split("|");
                                nameOfGPs[i] = gps_cols[0];
                                nameOfSurgery[i] = gps_cols[1];
                                langOfGPs[i] = gps_cols[2];
                                addrOfGPs[i] = gps_cols[3];
                                suburbOfGPs[i] = gps_cols[4];
                                phoneOfGPs[i] = gps_cols[5]
                                latiOfGPs[i] = gps_cols[6];
                                longiOfGPs[i] = gps_cols[7];
                            }

                            // -------- Result table -------
                            //                        var innerTable = "";
                            //                        for (var k = 0; k < gps_rows.length - 1; k++) {
                            //                            innerTable += "<tr><td>" + nameOfGPs[k] + "</td><td>" + nameOfSurgery[k] + "</td><td>" + langOfGPs[k] + "</td><td>" + addrOfGPs[k] + "</td><td>" + suburbOfGPs[k] + "</td><td>" + phoneOfGPs[k] + "</td></tr>";
                            //                        }
                            //                        resultTab = document.getElementById("resTab");
                            //                        resultTab.innerHTML = "<div class='table-responsive'><table class='table table-striped table-condensed table-hover'><thead><tr><td>GP Name</td><td>Surgery</td><td>Language</td><td>Address</td><td>Suburb</td><td>Contact Number</td></tr></thead><tbody>"
                            //                                + innerTable + "</tbody></table></div>";
                            // ------- Markers on Map -------
                            //                        var map = new google.maps.Map(document.getElementById('gPMap'), {
                            //                            zoom: 13,
                            //                            center: {lat: -37.8142, lng: 144.9632}
                            //                        });
                            for (var q = 0; q < latiOfGPs.length; q++) { // Start of multiple markers for(;;) loop -------
                                laFloat = parseFloat(latiOfGPs[q]);
                                lonFloat = parseFloat(longiOfGPs[q]);
                                /* -- Move to area of new search --- */
                                var latLngNewCenter = new google.maps.LatLng(parseFloat(latiOfGPs[0]), parseFloat(longiOfGPs[0]));
                                map.panTo(latLngNewCenter);
                                /* ---------------------------------- */
                                var myLatLng = {lat: laFloat, lng: lonFloat};
                                marker[q] = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                    title: nameOfSurgery[q]
                                });
                                /*  -------- Info Window ------------ */
                                var content = "<div>GP Name:   " + nameOfGPs[q]
                                        + "</div><br><div>Surgery:     " + nameOfSurgery[q]
                                        + "</div><br><div>Language:     " + langOfGPs[q]
                                        + "</div><br><div>Address:     " + addrOfGPs[q] + "," + suburbOfGPs[q]
                                        + "</div><br><div>Contact No.: " + phoneOfGPs[q]
                                        + "</div><br><div><button type='button' onclick='displayRoute()' data-toggle='modal' href='#myModal'>Show Route</button></div>";
                                var lat = parseFloat(latiOfGPs[q]);
                                var lng = parseFloat(longiOfGPs[q]);
                                var infowindow = new google.maps.InfoWindow();
                                google.maps.event.addListener(marker[q], 'click', (function (marker, content, infowindow, lat, lng) {
                                    return function () {
                                        closeInfos();
                                        destnLat = lat;
                                        destnLng = lng;
                                        infowindow.setContent(content);
                                        infowindow.open(map, marker);
                                        infos[0] = infowindow;
                                    };
                                })(marker[q], content, infowindow, lat, lng));
                                /* ---------------------------------- */
                            } // End of multiple markers for(;;) loop -------

                            var bounds = new google.maps.LatLngBounds();
                            for (var i = 0; i < marker.length; i++) {
                                bounds.extend(marker[i].getPosition());
                            }
                            map.fitBounds(bounds);
                            // Function for closing info window
                            // This function is to close the info window of a clicked marker when user clicks other marker
                            function closeInfos() {
                                if (infos.length > 0) {
                                    infos[0].set("marker", null);
                                    infos[0].close();
                                    infos.length = 0;
                                }
                            }

                        } else if (data === "") {
                            str = document.getElementById("errorMessage");
                            str.innerHTML = "Apologise! This suburb may have no GP speak your language. Please try other suburb.";
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
                    map = new google.maps.Map(document.getElementById("gPMap"), mapProp);
                    /* ----------- get current location ----------*/
                    // Try HTML5 geolocation.
                    var infoWindow = new google.maps.InfoWindow({map: map});
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            map.setCenter(pos);

                            //infoWindow.setPosition(pos);
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

            </script>
        <div class="container">

            <div class="col-sm-12">
                <div class="jumbotron">
                    <h1>Find General Practitioner</h1>
                    <p>
                        Quickly find the GPs who can speak your language.
                    </p>
                </div>
            </div>
            <script>

                $(document).ready(function () {
                    $('#languageInput').keyup(function (e) {
                        if (e.keyCode === 13)
                            $('#searchbtn').click();
                    });
                });
            </script>
            <div class="col-sm-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="control-label col-sm-2"><label class="control-label">Suburb:</label></div>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="suburbInput" placeholder="Enter suburb">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-sm-2"><label class="control-label">Language:</label></div>
                        <div class="col-sm-10">
                            <select class="form-control" id="languageInput">
                                <option value="" selected="selected">--- Select a language ---</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Dutch">Dutch</option>
                                <option value="French">French</option>
                                <option value="German">German</option>
                                <option value="Greek">Greek</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Indonesian">Indonesian</option>
                                <option value="Italian">Italian</option>
                                <option value="Malay">Malay</option>
                                <option value="Persian">Persian</option>
                                <option value="Portugese">Portugese</option>
                                <option value="Russian">Russian</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Swedish">Swedish</option>
                                <option value="Turkish">Turkish</option>
                                <option value="Vietnamese">Vietnamese</option>
                            </select>
                        </div>
                    </div>
                    <div style="text-align: center"><span id="errorMessage" style="color: red"></span></div>
                    <div style="text-align: center"><span id="hints" style="color: gainsboro">Hint: Leave as default will show all GPs in Victoria.</span></div>
                    <div class="form-group">
                        <p style="height:30px">
                        <div class="text-center"><button type="button" id="searchbtn" class="btn btn-primary btn-lg" onclick="showGPs()">Show GPs</button></div>
                        <p style="height:30px">
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <div id="gPMap" style="width:100%;height:500px;"></div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg panel panel-warning">
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
