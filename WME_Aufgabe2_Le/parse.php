<pre>
  <?php
    include "world_data_parser.php";
    $world_data_parser = new WorldDataParser();
    print_r($world_data_parser->parseCSV("world_data_v1.csv"));
  ?>
</pre>
