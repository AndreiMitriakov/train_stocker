<?php
class Model_Session extends Model
{
    static public function logout()
    {
        session_start();
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");

    }

    static public function auth($data)
    {
        if ($data['username'] and $data['pwrd'])
        {
            $pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
            $query = 'select password from users where login=\'' . $data['username'] . '\';';
            $stm = $pdo->query($query);//returned a PDO statement object
            $row = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
            if ($row['password'] == $data['pwrd'])
            {
                session_start();
                $_SESSION['login'] = $data['username'];
                $query = 'select role from users where login=\''.$data['username'].'\';';
                $stm = $pdo->query($query);//returned a PDO statement object
                $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement
                $_SESSION['role'] = $cell['role'];
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