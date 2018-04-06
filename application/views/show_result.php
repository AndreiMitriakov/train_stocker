<?php 
class View_Showing extends View{
    static public function show_result($data){
        $keys = array_keys($data['0']);
        foreach($keys as $key){
            echo ucfirst($key). ' ';
        }
        echo "<br>";
        foreach($data as $row ){
            if($row['login'] != 'admin'){
            foreach($keys as $key){
                    echo $row[$key]. ' ';
                }
                echo "  <form action=\"/user_bd/delete_user\" param = \"value\" method=\"POST\">
                <a href=\"/user_bd/delete_user\"></a>
                <button type=\"submit\" name=\"login\" value=";
                echo $row['login'];
                echo ">Delete</button>
                </form>";
                echo "
                <form action=\"/user_bd/set_role\" param = \"value\" method=\"POST\">
                    <a href=\"/user_bd/set_role\"></a>
                    <select name=\"role\" size=\"1\">
                    <option value=\"user\">User</option>
                    <option value=\"editor\">Editor</option>
                    </select>
                    <br>
                    <button type=\"submit\" name=\"login\" value=";
                    echo $row['login'];
                    echo ">Update</button>
                    </form>";

            }

        }

    }
}

?>
