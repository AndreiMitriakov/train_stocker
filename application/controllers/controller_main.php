<?php
    class Controller_Main extends Controller
    {
        function action_index()
        {
            if(isset($_COOKIE["PHPSESSID"]) == FALSE) {
                Template_View::generate('main_view.php');
            }
            else{
                header("Location:http://mstk.com/major");

            }

        }
        
    }