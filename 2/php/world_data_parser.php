<?php

class WorldDataParser {
	 function parseCSV($csvPath) {
	 	$dataArray = array(); 
	 	$arrayRow = array(); 

	 	$categories=array();
	 	
		$currentRow = 1;
		$numberOfCategories = 14; 

		$csvFile = fopen($csvPath, "r");

		while (($csvData = fgetcsv($csvFile, 0, ",")) !== FALSE){
			if ($currentRow==1){
				for ($i=0; $i<$numberOfCategories; $i++){
					$categories[$i]=$csvData[$i];
				}
				$currentRow++;
			}

			else{

				for ($i=0; $i<$numberOfCategories; $i++){
						 $arrayRow[$categories[$i]]=$csvData[$i];
					}

				$dataArray[]=$arrayRow;
	
				$currentRow++;
			}

		}
		fclose($csvFile);

		return $dataArray;
	}


	
	public function saveXML($dataArray) {
		if (is_null($dataArray)){
			return false;
		}

		$xml = new DOMDocument('1.0', 'utf-8');

		$xml->formatOutput = true;
		$root = $xml->createElement('Countries');
		$root = $xml->appendChild($root);

		foreach ($dataArray as $key => $value) {
			$country = $xml->createElement('Country');
			$country = $root->appendChild($country);

			foreach ($value as $key2 => $value2) {
				$categoryNode = $xml->createElement(strtok($key2, " "), rtrim($value2));
				$country->appendChild($categoryNode);
			}
		}

		$xml->save("./world_data.xml");
		//var_dump($xml);
		return true; 
	}

	public function printXML($xmlPath, $xslPath) {

		if (is_null($xslPath)){
			return "XSL Path Error";
		}

		if (is_null($xmlPath)){
			return "XML Path Error.";
		}

		$xsl = new DOMDocument();
		$xsl->load($xslPath);

		$xml = new DOMDocument();
		$xml->load($xmlPath);

		$xslProcessor = new XSLTProcessor();
		$xslProcessor->importStyleSheet($xsl);
		return $xslProcessor->transformToXML($xml);
	}

}
