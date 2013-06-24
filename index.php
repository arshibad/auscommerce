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

?>

<!DOCTYPE html>
<html manifest="application.appcache">
  <head>
    <meta charset="utf-8">
    <title>Auscommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	  
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	  
	 <link href="css/style.css" rel="stylesheet">
	 
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
        <h1>GOOGLE MAP WILL BE HERE</h1>
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
			 <div id="container" class="variable-sizes clearfix infinite-scrolling">
					<?php include("pages.php");?>
					
			 </div> <!-- #container -->
				
			 <nav id="page_nav">
					<a href="pages.php?p=2"></a>
			 </nav>
		
			 <div class="row">
				<div class="span4">
				  <h2>Heading</h2>
				  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				  <p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
				<div class="span4">
				  <h2>Heading</h2>
				  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				  <p><a class="btn" href="#">View details &raquo;</a></p>
			  </div>
				<div class="span4">
				  <h2>Heading</h2>
				  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				  <p><a class="btn" href="#">View details &raquo;</a></p>
				</div>
			 </div>
		</div>
      <hr>
      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery.isotope.min.js"></script>
	 <script src="js/jquery.infinitescroll.min.js"></script>
	 <script src="js/script.js"></script>
  </body>
</html>