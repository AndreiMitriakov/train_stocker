<?php
class Model_Link extends Model
{
    static public function add_link($data){ // Name, id_author, access are needed
        if ($data){
            if (!$data["URL"] and !$data["author_name"] and !$data["access"] and !$data["id_author"]) {
                return FALSE;
            }
            else{
                if ($data['description'] != null) {
                    $query = 'insert into links (lname,  description, author_name, id_author, access) values (\'' . $data['URL'] . '\', \'' . $data['description'] . '\', \'' . $data['author_name'] . '\', \'' . $data['id_author'] . '\',\'' . $data['access'] . '\');';
                }
                else{
                    $query = 'insert into links (lname, author_name, id_author, access) values (\'' . $data['URL'] . '\', \'' . $data['author_name'] . '\', \'' . $data['id_author'] . '\',\'' . $data['access'] . '\');';
                }
                $GLOBALS['pdo']->query($query);
                return TRUE;
            }
        }
    }

    static public function update_link($data){
        $id = $data['update'];
        $query = 'select access from links where id_link=\''.$id.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $cell = $stm->fetch(PDO::FETCH_ASSOC);//returned a PDO statement object
        if($cell['access'] == 'public'){
            $toSet = 'private';
        }
        else{
            $toSet = 'public';
        }
        $query = 'update links set access=\''.$toSet.'\' where id_link=\''.$id.'\';';
        $GLOBALS['pdo']->query($query);//returned a PDO statement object
    }

    static public function delete_link($data){
        $query = 'delete from links where id_link=\''.$data.'\';';
        $GLOBALS['pdo']->query($query);//returned a PDO statement object

    }
    static public function get_user_link($data){
        $query = 'select lname, author_name, access, description from links where id_link=\''.$data.'\';';
        $stm = $GLOBALS['pdo']->query($query);//returned a PDO statement object
        $cell = $stm->fetchAll(PDO::FETCH_ASSOC);//returned a PDO statement object
        return $cell;
    }

    static public function get_all_links(){
        $query = 'select id_link, lname, author_name, description,  access  from links;';
        $stm = $GLOBALS['pdo']->query($query);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}