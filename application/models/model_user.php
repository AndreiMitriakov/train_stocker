<?php
class Model_User extends Model
{
    static public function add_user($data){

        if ($data) {
            if (!$data["username"]) {
                return FALSE;
            }
            elseif (!$data["password"]) {
                return FALSE;
            }
            elseif (!$data["email"]) {
                return FALSE;
            }
            else{
                $query = 'select login, email from users ';
                $stm = $GLOBALS['pdo']->query($query);
                $info = $stm->fetchall(PDO::FETCH_ASSOC);
                foreach($info as $row){
                    if($row['login'] == $data['username']){
                        return FALSE;
                    }
                    /*if($row['email'] == $data['email']){
                        return FALSE;
                    }*/
                }
                $data['role'] = 'user';
                $hash =  crypt($data['password'], $data['username']);
                $query = 'insert into users (login, password, role, email) values (\''.$data['username'].'\',\''.$hash.'\', \'user\', \''.$data['email'].'\');';
                $GLOBALS['pdo']->query($query);
                $query = 'select id from users where login=\''.$data['username'].'\';';
                $stm = $GLOBALS['pdo']->query($query);
                $info = $stm->fetchall(PDO::FETCH_ASSOC);
                $_SESSION['email'] = $data['email'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['id_user'] = $info['0']['id'];
                return TRUE;
            }
        }
    }
    static public function change_role($data){
        $id = $data['id'];
        $query = 'select role from users where id=\''.$id.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
        if($cell['role'] == 'user'){
            $toSet = 'editor';
        }
        else{
            $toSet = 'user';
        }
        if($cell['role']!='admin') {
            $query = 'update users set role=\'' . $toSet . '\' where id=\'' . $id . '\';';
        }
        $GLOBALS['pdo']->query($query);//returned a PDO statement object
    }
    static public function get_role($data){
        $query = 'select role from users where login=\''.$data['username'].'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
        return $cell['role'];
    }
    static public function get_all_users($data=null){
        $query = 'select * from users;';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $info = $stm->fetchall(PDO::FETCH_ASSOC);
        return $info;
    }
    static public function get_user($data)
    {
        $query = 'select id, login, role, active, email from users where id=\'' . $data . '\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $cell = $stm->fetchAll(PDO::FETCH_ASSOC);//returned a PDO statement object
        return $cell;
    }


    static public function delete_user($data){
        $query = 'select role from users where id=\''.$data.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $role = $stm->fetchall(PDO::FETCH_ASSOC);
        if($role[0]['role'] != 'admin'){
            $query = 'delete from users where id=\''.$data.'\';';
            $GLOBALS['pdo']->query($query);//returned a PDO statement object
        }
    }
    static public function logout()
    {
        //session_start();

    }
    static public function activate_user($data)
    {
        //$pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
        $query = 'update users set active=\'1\' where id=\''.$data.'\';';
        $GLOBALS['pdo']->query($query);
    }
    static public function auth($data)
    {
        if ($data['username'] and $data['pwrd'])
        {
            $query = 'select password,active from users where login=\'' . $data['username'] . '\';';
            $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
            $row = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
            if (($row['password'] == crypt($data['pwrd'], $data['username']))&&($row['active']=='1'))
            {
                $query = 'select id from users where login=\'' . $data['username'] . '\';';
                $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
                $row = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
                //session_start();
                $_SESSION['login'] = $data['username'];
                $_SESSION['id'] = $row['id'];
                $query = 'select role from users where login=\''.$data['username'].'\';';
                $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
                $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement
                $_SESSION['role'] = $cell['role'];
                //Get permissions of user
                $_SESSION['permissions'] = Model_ACL::get_permissions($_SESSION['role']);
                return TRUE;
            } else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

}