<?php
//include("config.php");

$pagelimit = 30;
if(isset($_REQUEST['page'])){
  $page = $_REQUEST['page'];
}else{
  $page = 0;  
}

$start = $page*$pagelimit;
$end = $pagelimit;
//echo $start."=>".$end;
$productsStr = file_get_contents("product.json");
$productsArr  = json_decode($productsStr,true);
$productsArr = array_slice($productsArr, $start, $end);
//p($productsArr);exit;
/*
 <!--<div class="element transition metal   width2 height2  " data-symbol="Zr" data-category="transition">
					 <p class="image"><img src="img/gallery/<?php echo $productsArr[$i]['small_image']?>" alt="" class="img-polaroid"></p>
					 <h2 class="name"><?php echo $productsArr[$i]['name'];?></h2>
					 <p class="price"><?php echo $productsArr[$i]['price'];?></p>
				  </div>-->
 **/
?>
  <?php if($loaded != 1){?>
	 <ul>
  <?php }?>
  <?php
	  for($i=0;$i<count($productsArr);$i++){
  ?>
		<?php if($loaded == 1){?>
			 <li class="element isotope-item match miss" data-large="img/gallery/<?php echo $productsArr[$i]['small_image']?>" id="<?php echo $productsArr[$i]['name'];?>" data-title="<?php echo $productsArr[$i]['name'];?>" data-added="29/05/2013" data-visits="4">
				<div class="clientcontainer normal" style="z-index: 900;">
					<div class="clientcard hl">
						<div class="front face">
						  <img src="img/gallery/<?php echo $productsArr[$i]['small_image']?>">
						  <p><?php echo $productsArr[$i]['name'];?></p>	
						</div>
						<div class="back face center">
						  <div class="desc">
								<p>Product Name: <span class="product_name"><?php echo stripcslashes($productsArr[$i]['name']);?></span></p>
								<p>Product Description: <span class="product_name"><?php echo stripcslashes($productsArr[$i]['shortdescription']);?></span></p>
								<p>Date Added: <span class="date_added">29/05/2013</span></p>
								<p>Price: <span class="price"><?php echo $productsArr[$i]['price'];?></span></p>
						  </div>  
						</div>
					</div> 
					
				</div>
				
			 </li>
		<?php }else{?>
			 <li class="element isotope-item match miss" data-large="img/gallery/<?php echo $productsArr[$i]['small_image']?>" id="<?php echo $productsArr[$i]['name'];?>" data-title="<?php echo $productsArr[$i]['name'];?>" data-added="29/05/2013" data-visits="4" style="list-style: none;"><div class="front twirl normal" style="z-index: 900;"><img src="img/gallery/<?php echo $productsArr[$i]['small_image']?>"><p><?php echo $productsArr[$i]['name'];?></p></div><div class="desc" style="display:none"><p>Product Name: <span class="product_name"><?php echo $productsArr[$i]['name'];?></span></p><p>Product Description: <span class="product_name"><?php echo $productsArr[$i]['shortdescription'];?></span></p><p>Date Added: <span class="date_added">29/05/2013</span></p><p>Price: <span class="price"><?php echo $productsArr[$i]['price'];?></span></p></div></li>		  
		<?php }?>
  <?php }?>
  <?php if($loaded != 1){?>
	 </ul>
  <?php }?>