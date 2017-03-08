<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Search community center - Anyone Get Connected !</title>
        <link rel="shortcut icon" href="assets/images/gt_favicon.png">

        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <style>#googleMap {width:100%; height:500px}</style>
        <style type="text/css">
            table,th,tr,td{
                border: 1px solid black;
            }

        </style>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="js/jquery.min.js"></script>
        <script>
            window.addEventListener("keypress", function () {
                var keyCode = event.keyCode;
                if (keyCode === 13)
                    show_selection();
            });
            google.maps.event.addDomListener(window, 'load', initialize);
            /* ------- Grab and extract data from database --------- */
            var subu_selection;
            var map;
            var infos = [];
            var detailsOfClicked; // For info window
            var currentLat;
            var currentLng;
            var destnLat;
            var destnLng;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;

            function show_selection() {
                map = new google.maps.Map(document.getElementById("googleMap"), {
                    center: new google.maps.LatLng(-37.8142, 144.9632),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                subu_selection = document.getElementById("sel_suburb").value;
                $.post('phpdb/php_commu_center.php', {selectedSuburb: subu_selection}, function (data) {
                    var comm_rows = data.split("+");
                    var nameOfCenter = new Array();
                    var descOfCenter = new Array();
                    var addrOfCenter = new Array();
                    var suburbOfCenter = new Array();
                    var latiOfCenter = new Array();
                    var longiOfCenter = new Array();
                    var marker = [];
                    for (var i = 0; i < comm_rows.length - 1; i++)
                    {
                        var comm_cols = comm_rows[i].split("|");
                        nameOfCenter[i] = comm_cols[0];
                        descOfCenter[i] = comm_cols[1];
                        addrOfCenter[i] = comm_cols[2];
                        suburbOfCenter[i] = comm_cols[3];
                        latiOfCenter[i] = comm_cols[4];
                        longiOfCenter[i] = comm_cols[5];
                    }
                    // -------- Input table -------
                    //alert(comm_rows.length);
//                    var innerTable = "";
//                    for (var k = 0; k < comm_rows.length - 1; k++) {
//                        innerTable += "<tr><td>" + nameOfCenter[k] + "</td><td>" + descOfCenter[k] + "</td><td>" + addrOfCenter[k] + "</td><td>" + suburbOfCenter[k] + "</td></tr>";
//                    }
                    //      --- If the area has no community center ---
//                    if (comm_rows.length === 1)
//                    {
//                        tablePart3 = document.getElementById("t3");
//                        tablePart3.innerHTML = "<div style='font-size: large; color:orange'>Sorry, there is no community center in this area.</div>";
//                    } else {
//                        tablePart3 = document.getElementById("t3");
//                        tablePart3.innerHTML = "<div class='table-responsive'><table class='table table-striped table-condensed table-hover'><thead><tr><td>Center</td><td>Description</td><td>Address</td><td>Suburb</td></tr></thead><tbody>" + innerTable + "</tbody></table></div>";
//                    }

                    // ------- Markers on Map -------
                    for (var q = 0; q < latiOfCenter.length; q++) { // Start of multiple markers for(;;) loop -------
                        laFloat = parseFloat(latiOfCenter[q]);
                        lonFloat = parseFloat(longiOfCenter[q]);
                        /* -- Move to area of new search --- */
                        var latLngNewCenter = new google.maps.LatLng(parseFloat(latiOfCenter[0]), parseFloat(longiOfCenter[0]));
                        map.panTo(latLngNewCenter);
                        /* ----- */
                        var myLatLng = {lat: laFloat, lng: lonFloat};
                        marker[q] = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: nameOfCenter[q]
                        });
                        //  -------- Info Window --
                        var content = nameOfCenter[q]
                                + "<br><div><button type='button' style='text-align:center' onclick='showDetails()'>Show Details</button></div>"
                                + "<div><button type='button' onclick='displayRoute()' data-toggle='modal' href='#myModal'>Show Route</button></div>";
                        var infowindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker[q], 'click', (function (marker, content, infowindow, q) {
                            return function () {
                                closeInfos();
                                destnLat = parseFloat(trim(latiOfCenter[q].toString()));
                                destnLng = parseFloat(trim(longiOfCenter[q].toString()));
                                infowindow.setContent(content);
                                infowindow.open(map, marker);
                                infos[0] = infowindow;
                                detailsOfClicked = "";
                                detailsOfClicked = "<table><tr><td>Center:</td><td>"
                                        + nameOfCenter[q]
                                        + "</td></tr><tr><td>Description:</td><td>"
                                        + descOfCenter[q]
                                        + "</td></tr><tr><td>Address:</td><td>"
                                        + addrOfCenter[q]
                                        + "</td></tr><tr><td>Suburb:</td><td>"
                                        + suburbOfCenter[q]
                                        + "</td></tr></table>";
                            };
                        })(marker[q], content, infowindow, q));

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
                });
            }

            function showDetails() {
                detailsPart = document.getElementById("details");
                detailsPart.innerHTML = detailsOfClicked;
            }


            //function for showing first map
            function initialize() {
                var mapProp = {
                    center: new google.maps.LatLng(-37.8142, 144.9632),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

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
            // shows Direction
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

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="css/main.css">

        <style>#googleMap {width:100%; height:500px}</style>
        <style type="text/css">
            table,th,tr,td{
                border: 1px solid black;
            }

        </style>

    </head>
    <body>
        <!-- NavBar -->
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
                                <li class="active"><a href="community_center.php">Community Center</a></li>
                                <li><a href="community_school.php">Community School</a></li>
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
        <!--  --------------------------------------------- Content Below ------------------------------     --> 

        <div class="container">
            <div class="jumbotron">
                <h1>Community Centre</h1>
                <p>Donate free food for the hungry!!</p>

            </div>
            <!--        </div>
            
            
                    <div class="container ">-->
            <div class="col-sm-12 maincontent" style="margin-top:10px;min-height:500px"> 
                <div class="col-sm-8">
                    <div id="googleMap"></div>
                </div>
                <div class="col-sm-4">

                    <form>
                        <div class="form-group">
                            <label >Please Select Suburb For Community:</label>
                            <select class="form-control" id="sel_suburb">
                                <option value="Abbotsford">Abbotsford</option>
                                <option value="Albert Park">Albert Park</option>
                                <option value="Brunswick">Brunswick</option>
                                <option value="Brunswick East">Brunswick East</option>
                                <option value="Carlton">Carlton</option>
                                <option value="Carlton North">Carlton North</option>
                                <option value="Collingwood">Collingwood</option>
                                <option value="Docklands">Docklands</option>
                                <option value="East Melbourne">East Melbourne</option>
                                <option value="Flemington">Flemington</option>
                                <option value="Fitzroy">Fitzroy</option>
                                <option value="Footscray">Footscray</option>
                                <option value="Kensington">Kensington</option>
                                <option value="Melbourne" selected>Melbourne</option>
                                <option value="North Melbourne">North Melbourne</option>
                                <option value="Parkville">Parkville</option>
                                <option value="Prahran">Prahran</option>
                                <option value="Port Melbourne">Port Melbourne</option>
                                <option value="Richmond">Richmond</option>
                                <option value="Southbank">Southbank</option>
                                <option value="South Melbourne">South Melbourne</option>
                                <option value="South Yarra">South Yarra</option>
                                <option value="St Kilda">St Kilda</option>
                                <option value="Thornbury">Thornbury</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-default btn-sm" id="search" onclick="show_selection()">Search</button>
                        <p style="height:40px">
                        <div id="details"></div>
                    </form>

                </div>
            </div>
        </div>
        <br>

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
