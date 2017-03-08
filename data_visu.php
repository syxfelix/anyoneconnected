<!DOCTYPE html>
<?php $ethn = 'Englang'; ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Data Visualisation</title>
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
        <script type="text/javascript">

            var COLUMN_STYLES = {
                'Legend': [
                    {
                        'min': 'TOP 1',
                        'color': '#000000'
                    },
                    {
                        'min': 'TOP 2',
                        'color': '#111173'
                    },
                    {
                        'min': 'TOP 3',
                        'color': '#156892'
                    },
                    {
                        'min': 'TOP 4',
                        'color': '#1EC672'
                    },
                    {
                        'min': 'TOP 5',
                        'color': '#CB3D3D'
                    }
                ]
            };
            window.addEventListener("keypress", function () {
                var keyCode = event.keyCode;
                if (keyCode === 13)
                    show_contribution();
            });
            function show_contribution() {
                var lga = document.getElementById("ethnicity").value;
                var map = new google.maps.Map(document.getElementById('map-canvas'), {
                    center: new google.maps.LatLng(-37.8141, 144.9633),
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                for (column in COLUMN_STYLES) {
                    break;
                }
                addLegend(map);
                switch (lga) {
                    case "England":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'England' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'England' = 11651", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'England' = 9013", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'England' = 8632", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'England' = 7926", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'England' = 7862", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "India":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'India' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'India' = 10011", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'India' = 10309", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'India' = 8095", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'India' = 7767", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'India' = 7323", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "China":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'China' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'China' = 13764", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'China' = 11050", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'China' = 7504", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'China' = 6688", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'China' = 6605", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "NewZealand":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'New Zealand' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'New Zealand' = 5972", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'New Zealand' = 5034", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'New Zealand' = 2958", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'New Zealand' = 2882", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'New Zealand' = 2759", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Italy":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Italy' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Italy' = 8956", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Italy' = 7166", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Italy' = 6221", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Italy' = 5388", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Italy' = 3623", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Malaysia":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Malaysia' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malaysia' = 5489", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malaysia' = 5106", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malaysia' = 3351", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malaysia' = 3199", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malaysia' = 2928", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "SouthAfrica":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'South Africa' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'South Africa' = 3027", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'South Africa' = 1932", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'South Africa' = 1405", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'South Africa' = 1157", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'South Africa' = 1055", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Indonesia":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Indonesia' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Indonesia' = 2856", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Indonesia' = 1638", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Indonesia' = 947", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Indonesia' = 874", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Indonesia' = 734", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Bangladesh":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Bangladesh' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Bangladesh' = 645", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Bangladesh' = 544", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Bangladesh' = 447", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Bangladesh' = 440", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Bangladesh' = 415", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Canada":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Canada' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Canada' = 397", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Canada' = 394", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Canada' = 394", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Canada' = 316", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Canada' = 292", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Philippines":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Philippines' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Philippines' = 5223", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Philippines' = 3925", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Philippines' = 3323", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Philippines' = 2758", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Philippines' = 2023", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Malta":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Malta' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malta' = 5375", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malta' = 1836", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malta' = 1323", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malta' = 1305", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Malta' = 1169", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Iraq":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Iraq' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Iraq' = 7194", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Iraq' = 1427", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Iraq' = 752", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Iraq' = 461", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Iraq' = 386", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Afghanistan":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Afghanistan' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Afghanistan' = 4437", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Afghanistan' = 2250", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Afghanistan' = 555", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Afghanistan' = 246", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Afghanistan' = 232", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Sovakia":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Sovakia' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Sovakia' = 51", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Sovakia' = 41", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Sovakia' = 32", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Sovakia' = 30", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Sovakia' = 28", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Belarus":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Belarus' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Belarus' = 332", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Belarus' = 109", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Belarus' = 84", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Belarus' = 72", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Belarus' = 57", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                    case "Singapore":
                        var layer = new google.maps.FusionTablesLayer({
                            query: {select: "", from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW", where: ""},
                            styles: [{where: "'Singapore' = ''", polygonOptions: {fillColor: "#FFFFFF", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Singapore' = 1837", polygonOptions: {fillColor: "#000000", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Singapore' = 1467", polygonOptions: {fillColor: "#111173", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Singapore' = 866", polygonOptions: {fillColor: "#156892", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Singapore' = 840", polygonOptions: {fillColor: "#1EC672", strokeColor: "#FFFFFF", strokeWeight: 1}},
                                {where: "'Singapore' = 805", polygonOptions: {fillColor: "#85F1E6", strokeColor: "#FFFFFF", strokeWeight: 1}}],
                            options: {templateId: 2},
                            map: map
                        });
                        break;
                }

            }

            function addLegend(map) {
                var legendWrapper = document.createElement('div');
                legendWrapper.id = 'legendWrapper';
                legendWrapper.index = 1;
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
                        legendWrapper);
                legendContent(legendWrapper, column);
            }

            // Generate the content for the legend
            function legendContent(legendWrapper, column) {
                var legend = document.createElement('div');
                legend.id = 'legend';
                var title = document.createElement('p');
                title.innerHTML = column;
                legend.appendChild(title);
                var columnStyle = COLUMN_STYLES[column];
                for (var i in columnStyle) {
                    var style = columnStyle[i];
                    var legendItem = document.createElement('div');
                    var color = document.createElement('span');
                    color.setAttribute('class', 'color');
                    color.style.backgroundColor = style.color;
                    legendItem.appendChild(color);
                    var minMax = document.createElement('span');
                    minMax.innerHTML = style.min;
                    legendItem.appendChild(minMax);
                    legend.appendChild(legendItem);
                }

                legendWrapper.appendChild(legend);
            }

            function initialize() {
                google.maps.visualRefresh = true;
                var map = new google.maps.Map(document.getElementById('map-canvas'), {
                    center: new google.maps.LatLng(-36.6003559251473, 145.4691805),
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var layer = new google.maps.FusionTablesLayer({
                    query: {
                        select: "",
                        from: "10O1OqBqw58-834Mhu2MPkxfrZU868MBN-4kdw6ZW",
                        where: ""
                    },
                    options: {
                        styleId: 2,
                        templateId: 2
                    },
                    map: map
                });
//                google.maps.event.addListener(layer, 'click', function (e) {
//                    e.infoWindowHtml = e.row['LGA Name'].value + "<br>";
//                });
            }

            function showChart() {
                var ethnicity = document.getElementById("ethnicity").value;
                var arr = [];
                var indexLabelLga = [];
                var yNum = [];
                var yNumInt = [];
                $.post('phpdb/php_datavis.php', {ethnicity: ethnicity}, function (data) {
                    if(ethnicity === "NewZealand"){
                        ethnicity = "New Zealand";
                    }
                    if(ethnicity === "SouthAfrica"){
                        ethnicity = "South Africa";
                    }
                    var textTitle = "Top 5 LGAs For " + ethnicity + " Ethnicity";
                    var comm_rows = data.split("+");
                    for (var i = 0; i < comm_rows.length - 1; i++) {
                        var oneCell = comm_rows[i].split("|");
                        var oneLga = oneCell[0];
                        var number = oneCell[1];
                        if (number !== "") {
                            arr.push(number + "," + oneLga);
                        }
                    }
                    arr.sort();
                    for (var u = 0; u < 5; u++) {
                        var arrsplit = arr[u].split(",");
                        indexLabelLga[u] = arrsplit[1];
                        yNum[u] = arrsplit[0];
                        if (yNum[u].charAt(0) === "0") {
                            yNum[u] = yNum[u].charAt(1) + yNum[u].charAt(2) + yNum[u].charAt(3) + yNum[u].charAt(4);
                        }
                        yNumInt[u] = parseInt(yNum[u]);
                    }


                    CanvasJS.addColorSet("topFiveColors",
                            [
                                "#CB3D3D",
                                "#1EC672",
                                "#156892",
                                "#111173",
                                "#000000"
                            ]);
                    var chart = new CanvasJS.Chart("chartContainer",
                            {
                                //theme: "theme2", 
                                colorSet: "topFiveColors",
                                title: {text: textTitle}, data: [{type: "pie", showInLegend: true, toolTipContent: "{y} - #percent %", legendText: "{indexLabel}", dataPoints: [
                                            {y: yNumInt[0], indexLabel: indexLabelLga[0]},
                                            {y: yNumInt[1], indexLabel: indexLabelLga[1]},
                                            {y: yNumInt[2], indexLabel: indexLabelLga[2]},
                                            {y: yNumInt[3], indexLabel: indexLabelLga[3]},
                                            {y: yNumInt[4], indexLabel: indexLabelLga[4]}
                                        ]}]});
                    chart.render();
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
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
                                <li><a href="searchGPs.php">GPs By Language</a></li>
                                <li class="active"><a href="data_visu.php">LGA Ethnicity</a></li>
                            </ul>
                        </li>
                        <li><a href="where-to-stay.php">Where To Stay</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div> 
        <!-- /.navbar -->

        <p style="height:40px">
            <!-- /.navbar  -------Content below  -->
        <header id="head" class="secondary"></header><br>

        <div class="container">
            <div class="jumbotron">
                <h1>Ethnicity Contribution</h1>
                <p>
                    See top 5 LGAs for different selected ethnicity that you are interested in, the results will show with different colors.
                </p>
            </div>
            <p style="height:40px">
                <!--        </div>
                            
                            <div class="container">-->
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
                                <option value="NewZealand">New Zealander</option>
                                <option value="Italy">Italian</option>
                                <option value="Malaysia">Malaysian</option>
                                <option value="SouthAfrica">South African</option>
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
                        <b><button type="button" id="searchBtn" class="btn btn-default btn-sm" onclick="show_contribution();
                                showChart()">Search</button></b>
                    </form></div>
                <p style="height:60px">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <div><a  data-toggle='modal' href='#myModal'><span style="text-decoration: underline">See what is LGA</span></a></div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg panel panel-warning">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Local Government Area</h4>
                    </div>
                    <div class="modal-body">
                        <h1>LGA (Local Government Area)</h1><br>
                        <span>Local government in Australia is the lowest tier of government 
                            in Australia administered under the states and territories 
                            which in turn are beneath the federal tier. </span>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -------Content below -->
        <hr class="featurette-divider">
        <div class="container">
            <footer>
                <p class="pull-right"><a href="data_source.php" style="margin-right: 20px">Date Source</a><a href="#">Back to top</a></p>
                
                <p>&copy; 2016 De Coders, Monash University</p>
            </footer>
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