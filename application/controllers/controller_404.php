<?php
class Controller_404 extends Controller
{
    function action_index(){
        //echo $_SERVER['HTTP_REFERER'].' | ';
        echo 'Your personal 404 error!';
    }
}