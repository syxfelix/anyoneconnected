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
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <script>
            var finalResult;
            var reason1;
            var reason2;
            window.addEventListener("keypress", function () {
                    var keyCode = event.keyCode;
                    if (keyCode === 13)
                        getSuggestion();
                });
            function getSuggestion() {
                var eth_yes = document.getElementById("ethYes").checked;
                var sch_yes = document.getElementById("schYes").checked;
                var gps_yes = document.getElementById("gpsYes").checked;
                var ethni = document.getElementById("ethnicity").value;
                finalResult = "";
                reason1 = "";
                reason2 = "";
                if (eth_yes && sch_yes) {
                    reason1 = "<b>a.</b> Large number of people who are from " + ethni + " live in City of ";
                    reason2 = "<b>b.</b> Not far from city.";
                    $.post('phpdb/wheretostay.php', {ethni: ethni}, function (data) {
                        var ethGroup = data.split("+");
                        var flag = 0;
                        for (var i = 0; i < ethGroup.length - 1; i++) {
                            if (ethGroup[i].trim() === "Melbourne") {
                                finalResult = ethGroup[i];
                                flag++;
                            }
                        }
                        if (ethni === "New Zealand" || ethni === "Belarus"){
                            finalResult = "Port Phillip";
                        }
                        else 
                            finalResult = "Yarra";
                        passValueToModal();
                    });
                }
                if (eth_yes && !sch_yes) {
                    reason1 = "<b>a.</b> Large number of people who are from " + ethni + " live in City of ";
                    reason2 = "<b>b.</b> A little far from city.";
                    $.post('phpdb/wheretostay.php', {ethni: ethni}, function (data) {
                        var ethGroup = data.split("+");
                        if (ethGroup[2].trim() === "Melbourne")
                            finalResult = ethGroup[1];
                        else
                            finalResult = ethGroup[2];

                        passValueToModal();
                    });
                }
                if (!eth_yes && sch_yes) {
                    reason1 = "<b>a.</b> Less number of people who are from " + ethni + " live in City of ";
                    reason2 = "<b>b.</b> Not far from city.";
                    $.post('phpdb/wheretostay.php', {ethni: ethni}, function (data) {
                        var ethGroup = data.split("+");
                        if (ethni === "New Zealand" || ethni === "Belarus"){
                            finalResult = "Port Phillip";
                        }
                        else 
                            finalResult = "Maribyrnong";
                        passValueToModal();
                    });
                }
                if (!eth_yes && !sch_yes) {
                    reason1 = "<b>a.</b> Less people who are from " + ethni + " live in City of ";
                    reason2 = "<b>b.</b> A little far from city.";
                    $.post('phpdb/wheretostay.php', {ethni: ethni}, function (data) {
                        var ethGroup = data.split("+");
                        if (ethGroup[5].trim() === "Melbourne")
                            finalResult = ethGroup[3];
                        else
                            finalResult = ethGroup[4];
                        passValueToModal();
                    });
                }


            }
            function passValueToModal() {
                var resu = document.getElementById("res");
                resu.innerHTML = "<div style='font-size: large; color:orange; text-align: center'>CITY OF " + finalResult 
                        + "</div><br><div style='font-size: large; color:orange; text-align: left'>Reason:</div><div>"
                        + reason1 + finalResult + "</div><br><div>" + reason2 + "</div>";
            }
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="restaurant.php">Restaurant</a></li>
                                <li><a href="community_center.php">Community Center</a></li>
                                <li><a href="community_school.php">Community School</a></li>
                                <li><a href="searchGPs.php">GPs By Language</a></li>
                                <li><a href="data_visu.php">LGA Ethnicity</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="where-to-stay.php">Where To Stay</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div> 
        <!-- /.navbar -->

        <header id="head" class="secondary"></header>
        <p style="height:50px">
            <!--  --------------------------------------------- Content Below ----------------------------------   -->       
        <div class="container">
            <div class="jumbotron">
                <h1>Where To Stay ? <h1>
                <p>Please fill the following questionnaire so that we could recommend you the where it be suitable for you to live.</p>
                
            </div>
        </div>
        <h1 class="text-center">QUESTIONNAIRE</h1>
        <div class="container">
            <div class="col-sm-12">
                <div class="alert alert-success" role="alert">
                    a. Do you want to live with your ethnicity?<br>
                    <div class="radio">
                        <label><input type="radio" id="ethYes" name="ethnicityopt">Yes</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" id="ethNo" name="ethnicityopt">No</label>
                    </div>
                </div>
                <div class="alert alert-info" role="alert">
                    b. Do you want live near or in city?<br>
                    <div class="radio">
                        <label><input type="radio" id="schYes" name="schoolopt">Yes</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" id="schNo" name="schoolopt">No</label>
                    </div>
                </div>
                <div class="alert alert-warning" role="alert">
                    c. Do you like to live where there is a general practitioner who can speak you language ?<br>
                    <div class="radio">
                        <label><input type="radio" id="gpsYes" name="gpsopt">Yes</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" id="gpsNo" name="gpsopt">No</label>
                    </div>
                </div>
                <div class="alert alert-danger" role="alert">
                    <div class="form-group">
                        <label>d. Choose your ethnicity: </label><br>
                        <select class="form-control" id="ethnicity">
<!--                            <option value="England">English</option>-->
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
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <button type="button" class="btn btn-primary btn-lg" onclick="getSuggestion()" data-toggle="modal" href="#myModal">See Our Suggestion</button>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-1">
                <a href="where-to-stay.php"><button type="button" class="btn btn-default btn-sm">RESET</button></a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg panel panel-warning">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">OUR SUGGESTION</h4>
                    </div>
                    <div class="modal-body">
                        <!--                        <div class="container">-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="res"></div>
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

