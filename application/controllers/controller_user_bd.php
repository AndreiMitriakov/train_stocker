<?php
class Controller_User_bd extends Controller
{
    function action_add_user()
    {
        Model_Users::add_user($_POST);
        header("Location:http://mstk.com/major");
    }
    function action_get_users()
    {
        //$result = Model_Users::get_all_users($_POST);
        //header("Location:http://mstk.com/major/users");
        echo " PROBLEM IS SOMEWHERE HERE";
        //Template_View::generate('usersManaging_view.php');
    }
    function action_delete_user()
    {
        Model_Users::delete_user($_POST);
        header("Location:http://mstk.com/major");
    }
    function action_set_role()
    {
        Model_Users::set_role($_POST);
        header("Location:http://mstk.com/major");
    }
    function action_get_role()
    {
        $result = Model_Users::get_role($_POST);
        header("Location:http://mstk.com/major");
    }
    function action_index()
    {
        Template_View::generate('debug_model.php');
    }
}