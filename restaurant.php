<html>
    <head>
        <meta charset="UTF-8">
        <title>Anyone Get Connected!</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
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
                                <li class="active"><a href="restaurant.php">Restaurant</a></li>
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
    <!--  --------------------------------------------- Content Below ----------------------------------   -->       
        <div class="container">
            <div class="jumbotron">
                <h1>Restaurant</h1>
                <p>
                    No idea where is good restaurant? Want to find the restaurants that in particular area? Find the restaurant of your choice from all over Melbourne HERE!
                </p>
            </div>
<!--        </div>
        <div class="container">-->
            <div class="row">
                <div class="col-lg-12 text-center">
                <iframe src="https://www.zomato.com/widgets/res_search_widget.php?city_id=259&language_id=1&theme=red&widgetType=custom&sort=popularity" style="position:relative;width:100%;height:100%;" border="0" frameborder="0">
                </iframe>
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