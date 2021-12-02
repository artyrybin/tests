<?php
    set_time_limit(0);
    
    $file = fopen('test.csv', 'rt');
    $headers = fgetcsv($file);

    $document = new DOMDocument("1.0", "UTF-8");
    $document->formatOutput = true;

    while(($row = fgetcsv($file)) !== false) {
        $container = $document->createElement('item');
        foreach($headers as $i => $header) {
            $f = explode(";", $header);
            foreach($f as $header) {
                $child = $document->createElement($header);
                $child = $container->appendChild($child);
                $value = $document->createTextNode($row[$i]);
                $value = $child->appendChild($value);
            }
        }
        $document->appendChild($container);
    }

    $strxml = $document->saveXML();
    $handle = fopen('output.xml', "w");

    $strs  = explode(PHP_EOL, $strxml);
    $count = count($strs);

    foreach($strs as $i => $str) {
        echo "Записано $i строк из $count<br>";

        fwrite($handle, $str . PHP_EOL);

        ob_flush(); 
        flush();
    }

    fclose($handle);
?>