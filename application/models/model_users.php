<?php
class Model_Users extends Model
{
    static public function add_user($data){
        if ($data) {
            if (!$data["username"]) {
                return FALSE;
            }
            elseif (!$data["password"]) {
                return FALSE;
            }
            else{
                $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
                $query = 'select login from users ';
                $stm = $pdo->query($query);
                $info = $stm->fetchall(PDO::FETCH_ASSOC);
                foreach($info as $row){
                    if($row['login'] == $data['username']){
                        return FALSE;
                    }
                }
                $query = 'insert into users (login, password, role) values (\''.$data['username'].'\',\''.$data['password'].'\', \'user\');';
                $pdo->query($query);
                return TRUE;
            }
        }
    }
    static public function set_role($data){
        $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'update users set role=\''.$data['role'].'\' where login=\''.$data['login'].'\';';
        $pdo->query($query);//returned a PDO statement object
    }
    static public function get_role($data){
        $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'select role from users where login=\''.$data['username'].'\';';
        $stm = $pdo->query($query);//returned a PDO statement object
        $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
        return $cell['role'];

    }
    static public function get_all_users($data=null){
        $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'select * from users;';
        $stm = $pdo->query($query);//returned a PDO statement object
        $info = $stm->fetchall(PDO::FETCH_ASSOC);
        return $info;
    }
    static public function delete_user($data){
        $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'delete from users where login=\''.$data['login'].'\';';
        $pdo->query($query);//returned a PDO statement object

    }
}