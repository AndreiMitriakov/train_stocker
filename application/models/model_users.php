<?php
class Model_Users extends Model
{
    static public function add_user($data){
        if ($data) {
            if (!$data["username"]) {
                return FALSE;
            } elseif (!$data["pwrd"]) {
                return FALSE;
            } else {
                $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
                $query = 'insert into users (id, login, password, role) values (\'NULL\', \''.$data['username'].'\',\''.$data['pwrd'].'\', \'user\');';
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
    static public function get_all_users($data){
        $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'select * from users;';
        $pdo->query($query);//returned a PDO statement object
        return $pdo;
    }
    static public function delete_user($data){
        $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'delete from users where login=\''.$data.'\';';
        $pdo->query($query);//returned a PDO statement object
    }



}