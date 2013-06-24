<?php
include("config.php");

$file = fopen("https://docs.google.com/spreadsheet/pub?key=0AqNDW89YHKGedFJjdmtIYlp6U3lLYmQzZUVQTExjY1E&single=true&gid=0&output=csv","r");
//$file = fopen("McEngine_data.csv","r");


//we don't want to get the first line
$firstLine = true;

$products = array();
$p = 1;

while (($arr = fgetcsv($file, 10000, ",")) !== FALSE)
{
	if ($firstLine)
	{
		$firstLine = false;
	}
	else
	{
		$arr = str_replace("'", "\'", $arr);
		
		$arr[] = $p;
		$products[] = 	$arr;
		//echo "<pre>";
		//print_r($products);exit;
		$p++;
	}
}

// Sort the multidimensional array
usort($products, "custom_sort");

$allitems = array();
$items = array();
$all_category = array();
$all_prices = array();

//echo "<pre>";
//print_r($products);exit;
$html1="";
for($i=0;$i<count($products);$i++){
	  $t1 = 	$products[$i][3];
	  $t1Arr = @explode("/",$t1);
	  $t1Date = $t1Arr[1]."-".$t1Arr[0]."-".$t1Arr[2];
	  
	  $products[$i][3] = $t1Date;
	
	  $allitems[] = addslashes($html);
	
	
	$productArr = array();
	$productArr['id']= $i+1;//$products[$i][12];
	$productArr['name']= $products[$i][0];
	$productArr['category']= $products[$i][4];
	$productArr['price']= "0.00";
	$productArr['shortdescription']= $products[$i][1];
	$productArr['longdescription']= $products[$i][2];
	$productArr['productname']= $products[$i][0];
	$productArr['dateadded']= $products[$i][3];
	$productArr['url']= $products[$i][5];
	$productArr['compaddress']= $products[$i][6];
	$productArr['gmapaddress']= $products[$i][7];
	$productArr['date_establish']= $products[$i][8];
	$productArr['contact_email']= $products[$i][9];
	$productArr['small_image']= $products[$i][10];
	$productArr['large_image']= $products[$i][11];
	$productArr['addedBy']= $products[$i][12];
	$productArr['qty']= $products[$i][13];
	
	$items[] = $productArr;
	$all_category[] = $productArr['category'];
	$all_prices[] = $productArr['price'];
}
//echo "<pre>";
//print_r($items);exit;


$allitems_str = json_encode($items);

$myFile = TPATH_BASE."/product.json";;
$fh = fopen($myFile, 'w+');
fwrite($fh, $allitems_str);
fclose($fh);
?>