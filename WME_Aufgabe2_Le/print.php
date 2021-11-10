<?php
  require("world_data_parser.php");
  $world_data_parser = new WorldDataParser();
  $array = $world_data_parser->parseCSV("world_data_v1.csv");
  $world_data_parser->saveXML($array);
  echo $world_data_parser->printXML("world_data.xml", "world_data.xsl");

?>