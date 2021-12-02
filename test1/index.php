<?php
    include 'tree.php';

    function genTree($data) {
        $parents = [];
        foreach ($data as $index => $value) {
            $parents[$value['PARENT_ID']][$value['ID']] = $value;
        }
        $treeElem = $parents[0];

        getElem($treeElem, $parents);

        return $treeElem;
    }
    
    function getElem(&$treeElem, $parents) {
        foreach ($treeElem as $index => $value) {
            if (!isset($value['CHILD']))
                $treeElem[$index]['CHILD'] = [];

            if (array_key_exists($index, $parents)) {
                $treeElem[$index]['CHILD'] = $parents[$index];
                getElem($treeElem[$index]['CHILD'], $parents);
            }
        }
    }

    function showTree($data) {
        echo "<ul>";
            if(is_array($data))
            foreach ($data as $value) {
                echo '<li>';
                echo $value['NAME'];
                    if(count($value['CHILD']) > 0) {
                        showTree($value['CHILD']);
                    }
                echo '</li>';
            }
        echo "</ul>";
    }

    $tree = genTree($data);
    showTree($tree);
?>