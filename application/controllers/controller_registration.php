<?php
class Controller_Registration extends Controller
{
    function action_index()
    {
        Template_View::generate('registration_view.php');
    }
}