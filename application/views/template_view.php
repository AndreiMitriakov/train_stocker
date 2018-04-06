<?php
class Template_View extends View
{
    public static function generate($content_view, $role = null, $data = null)
    {
        echo "<!DOCTYPE html>
        <html lang=\"ru\">
        <head>";
        include 'application/views/head.php';
        echo "</head>
        <body>";
        include 'application/views/header.php';
        include 'application/views/navigation.php';
        include 'application/views/' . $content_view;

        if($data != null ) {
            include 'application/views/show_result.php';
            View_Showing::show_result($data);
        }
        if($role == 'editor'){
            $toShow = $role.'_view.php';
            include 'application/views/'.$toShow;
        }
        elseif ($role == 'admin'){
            include 'application/views/editor_view.php';
            $toShow = $role.'_view.php';
            include 'application/views/'.$toShow;
        }
        if($content_view != 'main_view.php'){
            include 'application/views/main_functions.php';
        }
        include 'application/views/footer.php';
        echo "</body>
        </html>";
    }
}