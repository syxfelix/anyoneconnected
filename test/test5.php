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
        <link rel="shortcut icon" href="assets/images/gt_favicon.png">

        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="css/main.css">
        <!--CDN css files-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <script src="http://maps.googleapis.com/maps/api/js"></script>
    </head>
    <body>
        <script>
            function showDetails() {
                var mapRouting = new google.maps.Map(document.getElementById("maprouting"), {
                    center: new google.maps.LatLng(-37.8142, 144.9632),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                $('#myModal').on('shown.bs.modal',function(){
                    showDetails();
                });
                
            }
        </script>
        <div class="container">
            <h2>Modal Example</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" onclick="showDetails()" class="btn btn-info btn-lg" data-toggle="modal" href="#myModal">Open Modal</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <div id="maprouting" style="width: 350px; height: 200px;"></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Javascript files should be linked at bottom of the page  -->
        <script src="js/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>



