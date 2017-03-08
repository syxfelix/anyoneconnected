<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Anyone Get Connected!</title>
        <link rel="shortcut icon" href="assets/images/gt_favicon.png">

        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="css/main.css">
        <!--CDN css files-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <script>
            function godown(){
                window.scrollTo(0,document.body.scrollHeight);
            }
        </script>


    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top headroom" style="background: rgba(0, 0, 0, .8);">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Button for smallest screens -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Progressus HTML5 template"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a href="index.php">Home</a></li>
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
                        <li><a href="where-to-stay.php">Where to Stay</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <!-- /.navbar -->

        <!-- Header -->
        <header>
            <div class="container-fluid">  
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="container2" style="height: 610px"><img class="container3" src="images/carousel1.jpg" alt=""/></div>
                            <div class="carousel-caption">
                                <h1>New to Victoria?</h1>
                                <h2>Need Information about restaurant, suburb ethnicity, GPs ?</h2>
                                <h2>We are here to help you</h2>
                                <button class="btn btn-primary btn-lg" onclick="godown()">See what we are offer</button>
                                <p style="height:20px">
                            </div>
                        </div>
                        <div class="item">
                            <div class="container2" style="height: 610px"><img class="container3" src="images/carousel2.jpg" alt=""/></div>
                            <div class="carousel-caption">
                                <h1>New to Victoria?</h1>
                                <h2>Need Information about restaurant, suburb ethnicity, GPs ?</h2>
                                <h2>We are here to help you</h2>
                                <button class="btn btn-primary btn-lg" onclick="godown()">See what we are offer</button>
                                <p style="height:20px">
                            </div>
                        </div>
                        <div class="item">
                            <div class="container2" style="height: 610px"><img class="container3" src="images/carousel3.jpg" alt=""/></div>
                            <div class="carousel-caption">
                                <h1>New to Victoria?</h1>
                                <h2>Need Information about restaurant, suburb ethnicity, GPs ?</h2>
                                <h2>We are here to help you</h2>
                                <button class="btn btn-primary btn-lg" onclick="godown()">See what we are offer</button>
                                <p style="height:20px">
                            </div>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </header>
        <!-- /Header -->

        <!-- Intro -->
        <div class="container text-center">
            <h2 class="thin">The place where you get information for</h2>
            <p class="text-muted">
                Get information about any restaurants, community center, GPs <br> 
                and schools in different suburbs of Victoria.
            </p>
        </div>
        <!-- /Intro-->

        <!-- Highlights - jumbotron -->
        <div class="jumbotron top-space">
            <div class="container">

                <h3 class="text-center thin">What we offer</h3>

                <div class="row">
                    <div class="col-md-3 col-xm-6 highlight">
                        <a href="restaurant.php">
                            <img src="images/restaurants.jpg" class="img-responsive"/>
                        </a>
                        <a href="restaurant.php"><div class="h-caption" style="text-decoration:underline">
                                <h4>Search Restaurant That You Like</h4>
                            </div></a>
                    </div>
                    <div class="col-md-3 col-xm-6 highlight">
                        <a href="community_center.php">
                            <img src="images/BirdNest_comm_center.jpg"  class="img-responsive"/>
                        </a>
                        <a href="community_center.php">
                            <div class="h-caption" style="text-decoration:underline">
                                <h4>Search Your Community Center</h4>
                            </div></a>
                    </div>
                    <div class="col-md-3 col-xm-6 highlight">
                        <a href="community_school.php">
                            <img src="images/monash.jpg"  class="img-responsive"/>
                        </a>
                        <a href="community_school.php">
                            <div class="h-caption" style="text-decoration:underline">
                                <h4>Find School For Your Children</h4>
                            </div></a>
                    </div>
                    <div class="col-md-3 col-xm-6 highlight">
                        <a href="searchGPs.php">
                            <img src="images/MonashMedicalCentre.jpg"  class="img-responsive"/>
                        </a>
                        <a href="searchGPs.php">
                            <div class="h-caption" style="text-decoration:underline">
                                <h4>Find GPs Speak Your Language</h4>
                            </div></a>
                    </div>
                </div> <!-- /row  -->

            </div>
        </div>
        <!-- /Highlights -->








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
