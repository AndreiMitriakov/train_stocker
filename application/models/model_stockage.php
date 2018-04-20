<?php
class Model_Stockage extends Model
{
    static public function check_potential_user($data)
    {
        $query = 'select url from queue;';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $url = $stm->fetchAll(PDO::FETCH_COLUMN);//returned a PDO statement object
        foreach ($url as $row){
            if($row == $data)
            {
                return True;
            }
        }
        return False;
    }
    static public function add_potential_user()
    {
        $_SESSION['url'] = md5($_SESSION['username']);
        $time = time();
        $query = 'insert into queue (url, time, id_author) values (\''.$_SESSION['url'].'\',\''.$time.'\',  \''.$_SESSION['id_user'].'\');';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
//        $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
    }
    static public function delete_potential_user($data)
    {
        $query = 'select id_new_user, id_author from queue where url=\''.$data.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        $id = $res['id_author'];
        $query = 'delete from queue where id_new_user=\''.$res['id_new_user'].'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $stm->fetch(PDO::FETCH_ASSOC);
        return $id;
    }
}
?>



