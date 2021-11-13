<?php
require "world_data_parser.php"; 
$wdp2 = new WorldDataParser();
$csvFile = $wdp2 ->parseCSV("world_data_v1.csv"); 
$xmlStatus = $wdp2->saveXML($csvFile);

if ($xmlStatus === true ){
		echo "XML Saved";
	} else {
		echo "XML Saved error ";
	} 
?>