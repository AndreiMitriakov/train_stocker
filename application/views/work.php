<?php
class View_Work extends View{
    public function data_to_show($data){
        eval($data[0]);
        unset($data[0]);
        echo"<table id = \"ajax\" class=\"table\">
            <tbody>";
        foreach($data as $row){
            echo "<tr>";
            foreach ($row as $element){
                echo "<th>";
                eval($element);
                echo "</th>";
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