<?php
  require("world_data_parser.php");
  $world_data_parser = new WorldDataParser();
  $array = $world_data_parser->parseCSV("world_data_v1.csv");
  if ($world_data_parser->saveXML($array)) {
    echo "XML Savestatus: erfolgreich (1)";
    $world_data_parser->saveXML($array);
  } else {
    echo "XML Savestatus: nicht erfolgreich (0)";
  }

?>
