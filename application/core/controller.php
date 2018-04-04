<?php
class Controller {
    public $model;
    public $view;
    function __construct()
    {
        require_once('application/models/model_users.php');
        require_once('application/views/template_view.php');
        
    }
    function action_index()
    {
        
    }
}