<?php
class View_Work extends View{
    public function data_to_show($data){
        eval($data[0]);
        unset($data[0]);
        echo"<table class=\"table\">
            <tbody>";
        foreach($data as $row){
            $j = 0;
            echo "<tr id ='$row[0]'>";
            foreach ($row as $element){
                echo "<th class ='$j'>";
                eval($element);
                echo "</th>";
                $j++;
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

    }

    public function logo(){
        echo "<h1><strong>        MSTK - not the best link stocker</strong></h1>";
    }
}
?>