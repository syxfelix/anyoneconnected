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
                        <li><a href="where-to-stay.php">Where To Stay</a></li>
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
            <div class="jumbotron" style="background-image: url(images/dtscs.jpg)">
                <h1 style="color: whitesmoke">Data Source<h1>
            </div>
            <div class='table-responsive'>
                <table class='table table-striped table-condensed table-hover'>
                    <thead>
                        <tr><td>No</td><td>Names</td><td>Physical Access Used</td><td>Frequency of Source Updates</td>
                            <td>Frequency of DC System Updates</td><td>Granularity</td><td>Copyright Details</td></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Zomato Api<br>(https://developers.zomato.com/api)</td><td>zomato api</td><td>Almost real time</td><td>Almost real time</td><td>High <br>i.e., Victoria → Suburb → Street → Number → Postcode</td><td>https://www.zomato.com/api_policy</td></tr>
                        <tr><td>2</td><td>School Locations<br> (http://data.gov.au/dataset/school-locations-victoria/resource/8353a5e3-4d54-471a-9757-799f2fa6cbc2)</td><td>csv</td><td>Every 2 years</td><td>Every 2 years</td><td>High <br>i.e., Victoria → Suburb → Street → Number → Postcode</td><td>Creative Commons Attribution 3.0 Australia</td></tr>
                        <tr><td>3</td><td>Crime Statistic by LGA <br>(http://www.police.vic.gov.au/content.asp?Document_ID=782)</td><td>csv</td><td>Every 2 years</td><td>Every 2 years</td><td>Low <br>i.e., Victoria → Suburb</td><td>http://www.police.vic.gov.au/content.asp?Document_ID=22</td></tr>
                        <tr><td>4</td><td>Community Centre Location</td><td>google api</td><td>Almost real time</td><td>Every 2 years</td><td>High<br> i.e., Victoria → Suburb → Street → Number → Postcode</td><td>http://www.google.com/intl/en/policies/terms/</td></tr>
                        <tr><td>5</td><td>Population Diversity In Victoria <br>(http://www.multicultural.vic.gov.au/population-and-migration/victorias-diversity)</td><td>pdf <br>(converted into csv)</td><td>Every 5 years</td><td>Every 5 years</td><td>Low <br>i.e., Victoria → Suburb</td><td>Copyright State of Victoria 2013 </td></tr>
                        <tr><td>6</td><td>Community Fact In Victoria<br> (http://www.multicultural.vic.gov.au/population-and-migration/victorias-diversity)</td><td>pdf <br>(converted into csv)</td><td>Every 5 years</td><td>Every 5 years</td><td>Low <br>i.e., Victoria → Suburb</td><td>Copyright State of Victoria 2013 </td></tr>
                        <tr><td>7</td><td>Australian Medical Association (AMA) </td><td>csv<br> (web access)</td><td>Almost real time</td><td>Every 6 months</td><td>High <br>i.e., Victoria → Suburb → Street → Number → Postcode</td><td>Copyright State of Victoria 2013 </td></tr>
                    </tbody>
                </table>
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

