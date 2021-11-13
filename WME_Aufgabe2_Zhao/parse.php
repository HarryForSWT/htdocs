<?php 
require "world_data_parser.php"; //Datei suchen/importieren
$wdp1 = new WorldDataParser(); //Objekt von Klasse WorldDataParser erzeugen
$csv = $wdp1 ->parseCSV("world_data_v1.csv"); //Funktionaufruf "Parsen" durch Objekt $wpd1
echo '<pre>' , print_r($csv) , '</pre>'; //Ausgabe der Arrays.
?>
