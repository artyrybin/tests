<?php
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

    fwrite($handle, $strxml);
    fclose($handle);
?>