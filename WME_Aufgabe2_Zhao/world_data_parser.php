<?php
class WorldDataParser{

    public function parseCSV($csvPath){

        $level1 = array();//Array für "thead"
        $level2 = array();//das echte Array für jede Zeile Daten
        $level3 = array();//Array für alle Zeilen

        $csvFile = fopen($csvPath, "r"); // csv-Datei durch Patheingabe finden
        $csvData = fgetcsv($csvFile,400,","); //Datenparsen aber nur die 1. Zeile
        $numberOfColumn = count($csvData);
        //Speicher alle Spaltennamen in ein Array
        for($i=0; $i<$numberOfColumn; $i++){
            $level1[$i] = $csvData[$i];
        }
        //Iterator wenn die letzte Zeile nicht geparst wurde
        while(!feof($csvFile)){
            $csvData = fgetcsv($csvFile,400,","); 
            //Values in Level2 einpachen nach Keys für jede Zeile Daten
            for($i=0; $i<count($level1); $i++){   
                $level2[$level1[$i]] = $csvData[$i];    
            }
            //Bevor man in die nachste Zeile geht, packt man das ganze array in Level3
            array_push($level3,$level2);  
        }
        //Nach der Nutzung von Datei immer schließen, um Resourcen freizugeben
        fclose($csvFile);

        return $level3;
    }

    public function saveXML($array){
        if (!(is_array($array) && is_array($array[0]))) {
            return false;
        }
        $dom = new DomDocument('1.0', 'UTF-8');
        $countries = $dom->createElement('Countries');
        foreach ($array as $c){
            $country = $dom-> createElement('country'); //strstr($key_array[$j], " ", true) ?: $key_array[$j]
            foreach ($c as $key=> $value){
                $category = $dom->createElement(strstr($key," ",true)?: $key,rtrim($value));
                $country->appendChild($category);
            }
            $countries->appendChild($country);
        }
        $dom->appendChild($countries);
       $dom->preserveWhiteSpace = false;
       $dom->formatOutput = true;
       $dom->save("world_data.xml");
        return true;
    }
    public function printXML($xmlPath, $xslPath) {

        $xsltProcessor = new XSLTProcessor();

		
		$xml = new DOMDocument();
		$xml->load($xmlPath);
        $xsl = new DOMDocument();
		$xsl->load($xslPath);
		
		$xsltProcessor->importStyleSheet($xsl);
		return $xsltProcessor->transformToXML($xml);
	}
    
}
?>