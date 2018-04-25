<?php
class Template_View extends View
{
    public static function generate($role = null,  $data = null, $link=null, $logo = null)
    {

        View_Head::head_and_start_html();
        echo "<body>";
        View_Header::header($role);//наследует все includes от View
        echo "<div class=\"row\">";
            echo "<div class=\"col-lg-10\">";
                if($data != null ){
                    View_Work::data_to_show($data);
                }
                if($link != null ){

                    View_Link::show_link($link);
                }

            echo "</div>";
            echo "<div class=\"col-lg-2\">";
                View_Ads::show_ads();
            echo "</div>";
        echo "<div class=\"col-lg-2\">";
        View_Buttons::butt();
        echo "</div>";
        echo "</div>";
        View_Footer::footer();
        //include 'application/views/footer.php';
        echo "</body>";
        View_Head::end_html();
    }
}
