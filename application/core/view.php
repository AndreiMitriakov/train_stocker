<?php
class View
{
    
    
    function __construct(){
        include 'application/views/footer.php';
        include 'application/views/header.php';
        include 'application/views/head.php';
        include 'application/views/ads.php';
        include 'application/views/work.php';
        include 'application/views/link.php';
        include 'application/views/dropdowns.php';
        include 'application/views/buttons.php';

    }
    //public $template_view; // здесь можно указать общий вид по умолчанию.
    public static function generate($content_view, $data = null)
    {
    /*
        if(is_array($data)){
        // преобразуем элементы массива в переменные
            extract($data);
        }
    */
    //include 'application/views/'.$template_view;

    }
}