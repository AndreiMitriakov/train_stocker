<?php
class Controller_Userbd extends Controller
{
    function action_add_new()
    {
        if ($_POST) {
            if (!$_POST["username"]) {
                header("Location:http://mstk.com/registration");
            } elseif (!$_POST["pwrd"]) {
                header("Location:http://mstk.com/registration");
            } else {

            }
            //header("Location:http://mstk.com");
        } else {
            //it wiil be nice to show a message that there is missed info
            header("Location:http://mstk.com/registration");
        }
    }

    function action_check()
    {
        if ($_POST) {
            if (!$_POST["username"]) {
                header("Location:http://mstk.com");
            }
            elseif (!$_POST["pwrd"]) {
                header("Location:http://mstk.com");
            } else {
                require_once('application/models/model_users.php');
                Model_Users::add_user($_POST);
                echo "DO SMTH";
            }
                //header("Location:http://mstk.com");

        }
        else {
            header("Location:http://mstk.com/registration");
        }
    }

    function action_index()
    {
        require_once('application/views/template_view.php');
        Template_View::generate('debug_model.php');
    }

}