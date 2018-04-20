<?php
class Controller {
    public $model;
    public $view;
    function __construct(){
        require_once('application/models/model_user.php');
        require_once('application/models/model_link.php');
        require_once('application/models/model_ACL.php');
        require_once('application/models/model_stockage.php');
        require_once('application/views/template_view.php');
        $this->view = new Template_View();
    }
    function action_index(){}
}