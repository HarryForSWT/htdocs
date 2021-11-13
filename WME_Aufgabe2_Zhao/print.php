<?php

require ("world_data_parser.php");
$wdp3 = new WorldDataParser();
$csvFile = $wdp3->parseCSV("world_data_v1.csv");
$save = $wdp3->saveXML($csvFile);
if($save===true){
    echo $wdp3->printXML("world_data.xml", "world_data.xsl");
}else{
    echo "Irgendwelche Datei wird nicht gefunden oder nicht gespeichert";
}
?>

