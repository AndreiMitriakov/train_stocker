<?php
    class Controller_Session extends Controller
    {
        function action_index(){

        }
        function action_logout(){
            Model_Session::logout();
            header("Location:http://mstk.com");
        }

        function action_auth(){
            if(Model_Session::auth($_POST)) {
                header("Location:http://mstk.com/major");
            }
            else{
                header("Location:http://mstk.com");
            }
        }
    }