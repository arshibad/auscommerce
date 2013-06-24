<?php
error_reporting(E_ALL ^ E_NOTICE);

$TPATH_BASE = dirname(__FILE__);
//$TPATH_BASE = str_replace("/cron","",$TPATH_BASE);
define('TPATH_BASE', $TPATH_BASE );

// Define the custom sort function
function custom_sort($a,$b) {
	  $t1 = 	$a[3];
	  $t1Arr = @explode("/",$t1);
	  $t1Date = $t1Arr[2]."-".$t1Arr[1]."-".$t1Arr[0];
	  $t2 = 	$b[3];
	  
	  $t2Arr = @explode("/",$t2);
	  $t2Date = $t2Arr[2]."-".$t2Arr[1]."-".$t2Arr[0];
	  return (strtotime($t1Date) - strtotime($t2Date))*-1;
}

function p($arr){
	  echo "<pre>";
	  print_r($arr);
	  echo "<hr>";
}

?>