<?php
class View_Header extends View{
    static public function header($role = null)
    {

        echo "
<nav class=\"navbar navbar-default\">
  <div class=\"container-fluid\">
    <div class=\"navbar-header\">
      <a class=\"navbar-brand\" href=\"/\">MSTK</a>
    </div>
    <ul class=\"nav navbar-nav\"> ";//navbar-left
    echo "</ul>
    ";
    echo "<ul class=\"nav navbar-nav navbar-right\"> ";
        if ($role != 'guest'){
            echo " <li><a href=\"/user/logout\"><b>Log out</b></a></li>";
        }
    echo "</ul>
    ";

        if ($role == 'guest') {
            View_Dropdowns::logreg();
        }

        if ($role == 'user') {

            //View_Buttons::logout();
        }
        if ($role == 'editor') {

        }
        $actual_link = "$_SERVER[REQUEST_URI]";
        if ($role == 'admin' and $actual_link != "/major/users") {
            echo "<ul class=\"nav navbar-nav navbar-left\"> ";
            echo "<li><a href=\"/major/users\"><b>Manage users</b></a></li>";
            echo "</ul>";
        }
        echo "   
   </div>
</nav>";
    }
}
?>