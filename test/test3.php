<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport"></meta>
        <title>lga_polygon - Google Fusion Tables</title>

        <script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3"></script>

        <script type="text/javascript">
            function initialize() {
                google.maps.visualRefresh = true;
                var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
                        (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
                if (isMobile) {
                    var viewport = document.querySelector("meta[name=viewport]");
                    viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
                }
                var mapDiv = document.getElementById('googft-mapCanvas');
                //mapDiv.style.width = isMobile ? '100%' : '1000px';
                //mapDiv.style.height = isMobile ? '100%' : '600px';
                var map = new google.maps.Map(mapDiv, {
                    center: new google.maps.LatLng(-36.6003559251473, 145.4691805),
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

                layer = new google.maps.FusionTablesLayer({
                    map: map,
                    heatmap: {enabled: false},
                    query: {
                        select: "col2",
                        from: "10FBs7CRHzPT-PFcD1dbNMzUgg9R9t9yfYKJF-idL",
                        where: ""
                    },
                    options: {
                        styleId: 2,
                        templateId: 2
                    }
                    //don't use the infowindows of the FTLayer
//                    suppressInfoWindows:true
                });
                
                
                if (isMobile) {
                    var legend = document.getElementById('googft-legend');
                    var legendOpenButton = document.getElementById('googft-legend-open');
                    var legendCloseButton = document.getElementById('googft-legend-close');
                    legend.style.display = 'none';
                    legendOpenButton.style.display = 'block';
                    legendCloseButton.style.display = 'block';
                    legendOpenButton.onclick = function () {
                        legend.style.display = 'block';
                        legendOpenButton.style.display = 'none';
                    }
                    legendCloseButton.onclick = function () {
                        legend.style.display = 'none';
                        legendOpenButton.style.display = 'block';
                    }
                }
            }

            google.maps.event.addDomListener(window, 'load', initialize);
            function Show() {
                alert("heell");
            }
        </script>
    </head>

    <body>
        <hr class="featurette-divider">
        <div class="container">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div id="googft-mapCanvas" style="height: 700px; width: 80%"></div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </body>
</html>