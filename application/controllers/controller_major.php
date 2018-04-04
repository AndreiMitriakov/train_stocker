<?php
    class Controller_Major extends Controller
    {
        function action_index()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                session_start();
                $toCall = $_SESSION['role'].'_view.php';
                Template_View::generate($toCall);
            }
            else{
                header("Location:http://mstk.com");
            }
        }   
        function action_users()
        {
            if(isset($_COOKIE["PHPSESSID"])) {
                session_start();
                Template_View::generate('usersManaging_view.php');
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