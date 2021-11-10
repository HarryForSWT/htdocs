<?php
class WorldDataParser{
  public function parseCSV($path){
    $file = fopen($path, "r");
    // create big array
    $array = array();
    // filter first row of csv in $csvHead
    $csvHead = fgetcsv($file, 1000, ",");
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
      // every row in csv is a sub array, which will then be pushed into the big array
      $sub_array = array();
      for ($i=0; $i < count($data); $i++){
        // declare keys from csvHead and values from sub array at their rightful index
        $sub_array[$csvHead[$i]] = $data[$i];
      }
      // append sub_array into big array
      array_push($array, $sub_array);
    };
    return $array;
  }

  public function saveXML($array){
      // checker if array and elements of array are arrays, return false if it isn't
      if (!(is_array($array) && is_array($array[0]))) return false;
      $xml = new DomDocument('1.0', 'UTF-8');
      $countries = $xml->createElement('Countries');
      // key_array for getting all the different categories (first array element)
      $key_array = array_keys($array[0]);
      // iterate through every array elements (countries)
      for ($i=0; $i < count($array); $i++) {
        $country = $xml->createElement("Country");
        // iterate through every category of country
        for ($j=0; $j < count($key_array); $j++) {
          // create xml node for each category of every country
          $category = $xml->createElement(strstr($key_array[$j], " ", true) ?: $key_array[$j]);
          $category->appendChild($xml->createTextNode(str_replace(' ', '', $array[$i][$key_array[$j]])));
          $country->appendChild($category);
        }
        $countries->appendChild($country);
      }
      $xml->appendChild($countries);
      // formatting XML
      $xml->preserveWhiteSpace = false;
      $xml->formatOutput = true;
      // create or update in world_data.xml
      $xml->save("world_data.xml");
      return true;
  }

  public function printXML($pathXML, $pathXSLT){
    $xslt = new XSLTProcessor();

    $xml = new DomDocument();
    $xml->load($pathXML);

    $xsl = new DomDocument();
    $xsl->load($pathXSLT);

    $xslt->importStylesheet($xsl);

    return $xslt->transformToXML($xml);
  }

}
?>
