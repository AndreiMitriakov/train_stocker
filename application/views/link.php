<?php
class View_Link extends View{
    public function show_link($data)
    {
        echo "<ul class=\"list-group\">";
        $i = 0;
        foreach ($data as $item) {
            if($i%2 == 0){
                echo "<li class=\"list-group-item list-group-item-info\">";
                eval($item);
                echo "</li>";
            }
            else{
                echo "<li class=\"list-group-item list-group-item-success\">";
                eval($item);
                echo "</li>";
            }
            $i++;
        }
        echo "</ul>";
        View_Buttons::go_back();
    }
}
?>