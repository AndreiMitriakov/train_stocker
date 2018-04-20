<?php
class View_Dropdowns extends View
{
    public static function logreg($role = null, $data = null)
    {
        echo "
            <ul class=\"nav navbar-nav navbar-right\">
    <li class=\"dropdown\">
        <a href=\"http://phpoll.com/register\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Sign up <span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu dropdown-lr animated flipInX\" role=\"menu\">
            <div class=\"col-xs-12\">
                <div class=\"text-center\"><h3><b>Sign up</b></h3></div>
                <form action=\"/user/add_user\" param = \"value\" method=\"POST\">
                    <a href=\"/user/add_user\"></a>
                    Login: <input type=\"text\" name=\"username\"><br>
                    Password: <input type=\"password\" name=\"password\"><br>
                    Email: <input type=\"text\" name=\"email\"><br>
                    <input type=\"submit\" value = \"Send\">
                </form>
            </div>
        </ul>
    </li>
    <li class=\"dropdown\">
        <a href=\"http://phpoll.com/login\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Log In <span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu dropdown-lr animated slideInRight\" role=\"menu\">
            <div class=\"col-lg-12\">
                <div class=\"text-center\"><h3><b>Log In</b></h3></div>
                <form action=\"/user/auth\" param = \"value\" method=\"POST\">
                    <a href=\"/user/auth\"></a>
                    Login: <input type=\"text\" name=\"username\"><br>
                    Password: <input type=\"password\" name=\"pwrd\"><br>
                    <input type=\"submit\" value = \"Log in\">
                </form>
            </div>
        </ul>
    </li>
    
</ul>
        ";
    }
}