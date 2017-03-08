<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"></meta>
        <title>Merge table3 - Google Fusion Tables</title>
        <link rel="shortcut icon" href="assets/images/gt_favicon.png">

        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="css/main.css">

        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="canvasjs.min.js" type="text/javascript"></script>
        <style type="text/css">
            #legend {
                background-color: #FFF;
                margin: 10px;
                padding: 5px;
                width: 150px;
            }

            #legend p {
                font-weight: bold;
                margin-top: 3px;
            }

            #legend div {
                clear: both;
            }

            .color {
                height: 12px;
                width: 12px;
                margin-right: 3px;
                float: left;
                display: block;
            }
        </style>
        

        <script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3"></script>

        <script type="text/javascript">
            function initialize() {
                google.maps.visualRefresh = true;
                var mapDiv = document.getElementById('map-canvas');
                var map = new google.maps.Map(mapDiv, {
                    center: new google.maps.LatLng(-37.328931911153404, 146.095401203125),
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                layer = new google.maps.FusionTablesLayer({
                    map: map,
                    heatmap: {enabled: false},
                    query: {
                        select: "col2\x3e\x3e1",
                        from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW",
                        where: ""
                    },
                    options: {
                        styleId: 2,
                        templateId: 2
                    }
                });

                
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body>
        <div class="container">
        <div class="col-sm-8">
            <div id="map-canvas" style="width:100%;height: 600px"></div>
        </div>
        <div class="col-sm-4">
            <div><form>
                    <div class="form-group">
                        <label >Please Select A Ethnicity:</label>
                        <select class="form-control" id="ethnicity">
                            <option value="England">English</option>
                            <option value="India">Indian</option>
                            <option value="China">Chinese</option>
                            <option value="New Zealand">New Zealander</option>
                            <option value="Italy">Italian</option>
                            <option value="Malaysia">Malaysian</option>
                            <option value="South Africa">South African</option>
                            <option value="Indonesia">Indonesian</option>
                            <option value="Bangladesh">Bangladeshi</option>
                            <option value="Canada">Canadian</option>
                            <option value="Philippines">Filipino</option>
                            <option value="Malta">Maltan</option>
                            <option value="Iraq">Iraqi</option>
                            <option value="Afghanistan">Afghani</option>
                            <option value="Sovakia">Sovakian</option>
                            <option value="Belarus">Belarusians</option>
                            <option value="Singapore">Singaporean</option>
                        </select>
                    </div>
                    <b><button type="button" id="searchBtn" class="btn btn-default btn-sm" onclick="show_contribution();showChart()">Search</button></b>
                </form></div>
            <p style="height:60px">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="assets/js/headroom.min.js"></script>
        <script src="assets/js/jQuery.headroom.min.js"></script>
        <script src="assets/js/template.js"></script>

        <!-- Google Maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
        <script src="assets/js/google-map.js"></script>
</body>
</html>