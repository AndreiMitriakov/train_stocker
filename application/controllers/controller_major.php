<?php
    class Controller_Major extends Controller
    {
        function action_index()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                session_start();
                $view = 'major_view.php';
                Template_View::generate($view, $_SESSION['role']);
            }
            else{
                header("Location:http://mstk.com");
            }
        }   
        function action_users()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                session_start();
                $data = Model_Users::get_all_users();
                Template_View::generate('usersManaging_view.php', null, $data);
            }
            else{
                header("Location:http://mstk.com");
            }
        }
        function action_flinks()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                session_start();
                Template_View::generate('flinksManaging_view.php');
            }
            else{
                header("Location:http://mstk.com");
            }
        }
        function action_profile()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                session_start();
                Template_View::generate('profileManaging_view.php');
            }
            else{
                header("Location:http://mstk.com");
            }
        }
    }