<?php
class Template_View extends View
{
    public static function generate($content_view, $data = null)
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
        if($data != null) {
            include 'application/views/show_result.php';
            View_Showing::show_result($data);
        }
        include 'application/views/footer.php';
        echo "</body>
        </html>";
    }
}