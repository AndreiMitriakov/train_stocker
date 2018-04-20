<?php
class Model_ACL extends Model
{
    
    public static function get_permissions($role){
        $query = 'select public_c, private_c, public_r, private_r, public_u, private_u,   public_d, private_d  from ACL where role=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
        return $cell;

    }
    public static function check_public_C($role){
        $query = 'select public_c from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public static function check_public_R($role){
        $query = 'select public_r from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function check_public_U($role){
        $query = 'select public_u from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function check_public_D($role){
        $query = 'select public_d from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function check_private_C($role){
        $query = 'select private_c from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function check_private_R($role){
        $query = 'select private_r from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function check_private_U($role){
        $query = 'select private_u from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function check_private_D($role){
        $query = 'select private_d from ACL where url=\''.$role.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $res = $stm->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    //--Place of comments--//
    /*insert ACL (role, public_c, public_r,
public_u, public_d, private_c, private_r, private_u,
private_d , user_c , user_r, user_u
, user_d ) values ('admin', '1','1','1','1','1','1','1','1','1','1','1','1');*/
}

