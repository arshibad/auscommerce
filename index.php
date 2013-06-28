<?php
include("config.php");

$productsStr = file_get_contents("product.json");

$productsArr  = json_decode($productsStr,true);

$all_category = array_unique($all_category);
asort($all_category);
$all_prices = array_unique($all_prices);
asort($all_prices);


$allitems_str = json_encode($allitems);
//echo "<pre>";
//print_r($allitems_str);exit;
$items_str = json_encode($items);
$all_category_str = json_encode($all_category);
$all_prices_str = json_encode($all_prices);
//manifest="application.appcache"
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Auscommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	  
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	  
	 <link href="css/style.css" rel="stylesheet">
	 
	 <script src="http://maps.google.com/maps/api/js?sensor=false&.js"></script>
	 <script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js"></script>
	 
	 
	 <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  </head>
  
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="">Auscommerce</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="contact.php">Contact</a></li>
				  <li><a href="sitemap.php">Site Map</a></li>
              <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="keyword">
              <button type="submit" class="btn">Search</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <div class="hero-unit">
        <div id="map_canvas"></div>
      </div>
	  <div class="nav_bar">
			 <ul class="nav nav-tabs">
					<li class="active">
					  <a href="#">All</a>
					</li>
					<li><a href="#">Technology</a></li>
					<li><a href="#">Business</a></li>
					<li><a href="#">Professional</a></li>
					<li style="float:right"><a href="?output=grid"><img src="img/grid.png"></a></li>
					<li style="float:right"><a href="?output=list"><img src="img/list.png"></a></li>
			 </ul>
	  </div>
      <!-- Example row of columns -->
		<div align="center">
			 
			 <div id="container" class="row clickable clearfix infinite-scrolling">
					<ul id="tiles" class="isotope" style="position: relative; overflow: hidden; height: 4592px; width: 1470px;">
					<?php
					$loaded = 1;
					include("pages.php");?>
					</ul>
			 </div> <!-- #container -->
			 <nav id="page_nav">
			 <a href="pages.php?page=2"></a>
		  </nav>
		</div>
      <hr>
      <footer>
        <p>&copy; Auscommerce 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery.isotope.min.js"></script>
	 <script src="js/jquery.infinitescroll.min.js"></script>
	 <script type="text/javascript" src="js/jquery.imagesloaded.js"></script>
	 <script src="js/script.js"></script>
  </body>
</html>