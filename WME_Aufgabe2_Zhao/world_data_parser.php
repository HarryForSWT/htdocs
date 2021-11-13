<?php

class WorldDataParser{

    public function parseCSV($csvPath){
        $csvFile = fopen($csvPath, "r");

        $csvData = fgetcsv($csvFile,500,",");


        fclose($csvFile);

        return $csvData;
    }
}
?>