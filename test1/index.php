<ul>
    <?php
        include 'tree.php';
        $r = [];
        
        /**
         * Преобразование массива дочерних элементов
         */

        foreach($data as $i => $v) {
            if($v['PARENT_ID'] != 0)
                $r[$v['PARENT_ID']][$i] = ['ID' => $v['ID'], 'NAME' => $v['NAME']];
        }
        
        foreach($data as $index => $item) {
            if($item['PARENT_ID'] == 0) {
                echo "<li>";
                    echo $item['NAME'];
                    echo "<ul>";
                    if(is_array($r[$item['ID']]))
                    foreach($r[$item['ID']] as $i) {
                        echo "<li>";
                            echo $i['NAME'];
                            echo "<ul>";
                            if(is_array($r[$item['ID']]))
                            foreach($r[$i['ID']] as $i) {
                                echo "<li>";
                                echo $i['NAME'];
                                    echo "<ul>";
                                    if(is_array($r[$item['ID']]))
                                    foreach($r[$i['ID']] as $i) {
                                        echo "<li>";
                                        echo $i['NAME'];
                                        echo "</li>";
                                    } 
                                    echo "</ul>";
                                echo "</li>";
                            } 
                            echo "</ul>";
                        echo "</li>";
                    } 
                    echo "</ul>";
                echo "</li>";
            }
        }
        
    ?>
</ul>