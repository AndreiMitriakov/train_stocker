<?php
class Controller_Link extends Controller
{
    function action_add_link()
    {
        //session_start();
        $_POST['author_name'] = $_SESSION['login'];
        $_POST['id_author'] = $_SESSION['id'];
        Model_Link::add_link($_POST);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //header("Location:http://mstk.com/major");
    }
    function action_delete_link()
    {
        Model_Link::delete_link($_POST['id_link']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    function action_update_link()
    {


        //$data = file_get_contents('php://input');
        //print_r($data);
        Model_Link::update_link($_POST);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //echo "1";

    }
    function action_get_user_links()
    {
        $result = Model_Link::get_user_links($_SESSION['login']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    function action_get_all_public_links()
    {
        $result = Model_Link::get_all_public_links();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    function action_get_all_links()
    {
        $result = Model_Link::get_all_links();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
    /*
     *             $oneLine = array();
            if ($row['access'] == 'public'){
                echo "2";
                if($permissions['public_r']==0){

                }
                else{
                    $oneLine = $row;
                    echo "2";
                    //print_r($oneLine);
                    //exit();
                    if($permissions['public_d']==1){
                        $oneLine = array('delete' => 'View_Buttons::delete_link($row[\'id_link\']);' );
                    }
                    else {
                        $oneLine = array('delete' => 'View_Buttons::empty_button()' );
                    }

                    if($permissions['public_u']==1){
                        $oneLine = array('update' => 'View_Buttons::update_link($row[\'id_link\'], $row[\'access\']);' );
                    }
                    else {
                        $oneLine = array('update' =>'View_Buttons::empty_button()');
                    }
                    $oneLine = array('check' => 'View_Buttons::check_link($row);');
                }
            }
            if ($row['access'] == 'private'){
                if($permissions['private_r']==0){

                }
                else{
                    $oneLine = $row;
                    $oneLine = $row;
                    //print_r($oneLine);
                    if($permissions['private_d']==1){
                        $oneLine = array('delete' => 'View_Buttons::delete_link($row[\'id_link\']);' );
                    }
                    else {
                        $oneLine = array('delete' => 'View_Buttons::empty_button();');
                    }
                    if($permissions['private_u']==1){
                        $oneLine = array('update' =>  'View_Buttons::update_link($row[\'id_link\'], $row[\'access\']);');
                    }
                    else {
                        $oneLine = array('update'=>'View_Buttons::empty_button()');
                    }
                    $oneLine = array('check' => 'View_Buttons::check_link($row);');
                }
            }
            if (sizeOf($oneLine)>0){
                $toReturn = array($oneLine);
            }
            $i++;

        }

        if($permissions['public_c']==1 or $permissions['private_c']==1){
            $toReturn=array('create' => "View_Buttons::create_link();");
        }
        //End----------------------------------------*/