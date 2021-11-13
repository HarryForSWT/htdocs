<?php 
include "world_data_parser.php";
$wdp1 = new WorldDataParser();
$csv = $wdp1 ->parseCSV("world_data_v1.csv");
echo '<pre>' , print_r($csv) , '</pre>';
?>