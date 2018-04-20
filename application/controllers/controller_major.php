<?php
    class Controller_Major extends Controller
    {
     function action_prepare()
        {
            $i = 0;
            $toSend = array();
            if($_SESSION['permissions']['public_c'] or $_SESSION['permissions']['private_c']){
                $toSend[] = 'View_Buttons::create_link();';
            }
            else{
                $toSend[] = 'View_Buttons::empty_button();';
            }
            if(sizeOf($_SESSION['data'])>0 ) {
                $row = array();
                //create table names
                $keys = array_keys($_SESSION['data'][0]);

                foreach($keys as $key){
                    if($key!='description' and $key!='id_author') {
                        $key = str_replace('_', ' ', $key);
                        $key = ucfirst($key);
                        $key = split(' ', $key);
                        $row[] = 'echo "'.$key[0].'";';
                    }
                }
                //$row[] = 'echo "Delete";';
                //$row[] = 'echo "Update";';
                //$row[] = 'echo "Check";';
                $toSend[] = $row;

                $i = 1;
                foreach($_SESSION['data'] as $element ) {
                    $row = array();
                    if($_SESSION['permissions']['public_r'] and $element['access']=='public'){
                        $row[] = 'echo "'.$element['id_link'].'";';
                        $row[] = 'echo "'.$element['lname'].'";';
                        $row[] = 'echo "'.$element['author_name'].'";';
                        $row[] = 'echo "'.$element['access'].'";';
                        if($_SESSION['permissions']['public_d'] ){
                            $row[] = 'View_Buttons::delete_link(\''.$element['id_link'].'\');';
                        }
                        else{
                            $row[] = 'View_Buttons::empty_button();';
                        }
                        if($_SESSION['permissions']['public_u'] ){
                            $row[] = 'View_Buttons::update_link(\''.$element['id_link'].'\');';
                        }
                        else{
                            $row[] = 'View_Buttons::empty_button();';
                        }
                        $row[] = 'View_Buttons::check_link(\''.$element['id_link'].'\');';
                        $toSend[] = $row;
                    }
                    if($_SESSION['permissions']['private_r'] and $element['access']=='private'){
                        $row[] = 'echo "'.$element['id_link'].'";';
                        $row[] = 'echo "'.$element['lname'].'";';
                        $row[] = 'echo "'.$element['author_name'].'";';
                        $row[] = 'echo "'.$element['access'].'";';
                        if($_SESSION['permissions']['private_d'] ){
                            $row[] = 'View_Buttons::delete_link(\''.$element['id_link'].'\');';
                        }
                        else{
                            $row[] = 'View_Buttons::empty_button();';
                        }
                        if($_SESSION['permissions']['private_u'] ){
                            $row[] = 'View_Buttons::update_link(\''.$element['id_link'].'\');';
                        }
                        else{
                            $row[] = 'View_Buttons::empty_button();';
                        }
                        $row[] = 'View_Buttons::check_link(\''.$element['id_link'].'\');';
                        $toSend[] = $row;
                    }
                    $i++;
                }
            }
            $_SESSION['data']=$toSend;
        }
        function action_finish($data)//Some problems with sessions. Where should it be started ?
        {
            if(isset($_COOKIE["PHPSESSID"]) == FALSE){
               // session_start();
                $_SESSION['role'] = 'guest';
                $_SESSION['permissions'] = Model_ACL::get_permissions($_SESSION['role']);
                //$pdo = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
            }
            else{
               // session_start();//Prove if it is needed
            }
            if (Model_Stockage::check_potential_user($data)) {
                $id = Model_Stockage::delete_potential_user($data);
                Model_User::activate_user($id);
                $this->view->generate($_SESSION['role']);
            } else {
                $_SESSION['message'] = 'This link is already used or out of date.';
                header("Location:http://mstk.com");
            }
        }
        function action_show_link()
        {

            //session_start();

            $result = Model_Link::get_user_link($_POST['id_link']);
            
            $block = array();
            $i = 0;
            $keys= array_keys($result[0]);
            $keys_ = array();
            foreach($keys as $key){
                $key = str_replace('_', ' ', $key);
                $key = ucfirst($key);
                $key = split(' ', $key);
                $keys_[] = $key[0];

            }
            foreach ($result[0] as $element){

                $block[] = 'echo \'<strong>'.$keys_[$i].':</strong><br> '.$element.'\';';
                $i++;
            }
            $this->view->generate($_SESSION['role'], null, $block);
        }
        function action_show_user()
        {
            $result = Model_User::get_user($_POST['id']);
            $block = array();
            $i = 0;
            $keys= array_keys($result[0]);
            $keys_ = array();
            foreach($keys as $key){
                $key = str_replace('_', ' ', $key);
                $key = ucfirst($key);
                $key = split(' ', $key);
                $keys_[] = $key[0];

            }
            foreach ($result[0] as $element){

                $block[] = 'echo \'<strong>'.$keys_[$i].':</strong><br> '.$element.'\';';
                $i++;
            }
            $this->view->generate($_SESSION['role'], null, $block);
        }
        function action_index()
        {
            if(isset($_COOKIE["PHPSESSID"]) == FALSE) {
                $_SESSION['role'] = 'guest';
                $_SESSION['permissions'] = Model_ACL::get_permissions($_SESSION['role']);
                $_SESSION['data'] = Model_Link::get_all_links();
                $this->action_prepare();
                if(sizeOf($_SESSION['data'])>2) {
                    $this->view->generate($_SESSION['role'], $_SESSION['data']);
                }
                else{
                    $this->view->generate($_SESSION['role'], null, null, 'logo');
                }
            }
            else{
                $_SESSION['data'] = Model_Link::get_all_links();
                $this->action_prepare();
                if(sizeOf($_SESSION['data'])>2) {
                    $this->view->generate($_SESSION['role'], $_SESSION['data']);
                }
                else{
                    $this->view->generate($_SESSION['role'], null, null, 'logo');
                }
            }
        }
        function action_users()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                $_SESSION['data'] = Model_User::get_all_users();
                $this->action_prepare_users();
                $this->view->generate($_SESSION['role'], $_SESSION['data']);
            }
            else{
                header("Location:http://mstk.com");
            }
        }
     function action_prepare_users()
     {
         $i = 0;
         $toSend = array();
         $toSend[] = 'View_Buttons::empty_button();';
         if(sizeOf($_SESSION['data'])>0 ){
             $row = array();
             //create table names
             $keys = array_keys($_SESSION['data'][0]);
             foreach($keys as $key){
                 if($key!='password') {
                     $key = str_replace('_', ' ', $key);
                     $key = ucfirst($key);
                     $key = split(' ', $key);
                     $row[] = 'echo "'.$key[0].'";';
                 }
             }
             $toSend[] = $row;
             $i = 1;
             foreach($_SESSION['data'] as $element ) {
                 $row = array();
                 $row[] = 'echo "'.$element['id'].'";';
                 $row[] = 'echo "'.$element['login'].'";';
                 $row[] = 'echo "'.$element['active'].'";';
                 $row[] = 'echo "'.$element['role'].'";';
                 $row[] = 'echo "'.$element['email'].'";';
                 $row[] = 'View_Buttons::delete_user(\''.$element['id'].'\');';
                 $row[] = 'View_Buttons::change_role_user(\''.$element['id'].'\');';
                 $row[] = 'View_Buttons::check_user(\''.$element['id'].'\');';
                 $toSend[] = $row;
                 $i++;
             }

         }
         $_SESSION['data']=$toSend;
     }

    }