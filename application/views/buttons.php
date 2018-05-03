<?php
class View_Buttons extends View
{
    public static function logout($role = null, $data = null)
    {
        echo "
           <form action=\"/user/logout\" param = \"value\" method=\"POST\">
    <a href=\"/user/logout\"></a>
    <input type=\"submit\" value = \"Logout\">
</form>
        ";
    }


    public static function go_back()
    {
        echo "
            <button onclick=\"goBack()\">Go Back</button>
            <script>
            function goBack() {
                window.history.back();
            }
            </script>
        ";
    }


    public static function update_link($data=null)
    {

        echo "<button type=\"button\" onclick=\"update_link('$data')\">Update</button>";
        /*
        echo "
        <form action=\"/link/update_link\" param = \"value\" method=\"POST\">
                <button  type=\"submit\" class=\"btn btn-primary\" name =\"id_link\" value=\"$data\">Update link</button>
        </form>
                ";
    */

    }
    public static function empty_button($data=null){}
    public static function check_link($data=null)
    {
        echo "
        <form action=\"/major/show_link\" param = \"value\" method=\"POST\">
                <button  type=\"submit\" class=\"btn btn-primary\" name =\"id_link\" value=\"$data\">Check link</button>
        </form>
                ";
    }
    public static function delete_link($data=null)
    {
        echo "<button type=\"button\" onclick=\"delete_link('$data')\">Delete</button>";
    }

    public static function create_link()
    {
        echo "
<form action=\"/link/add_link\"  method=\"POST\" class=\"form-inline\" role=\"form\">
   <div class=\"form-group \">
      <label >URL</label>
	  <input type=\"text\" class = \"dispC\" class=\"form-control\" name=\" URL\" >
   </div>
   <div class=\"form-group\">
    <label>Access</label>
    <select class = \"dispC\" class=\"form-control\" name=\"access\">
      <option value = \"public\">Public</option>
      <option value = \"public\">Private</option>
    </select>
 </div>
   <div class=\"form-group\">
      <label>Description</label>
	  <textarea class = \"dispC\" name=\"description\" type=\"text\"  ></textarea>
   </div>
   <button type=\"submit\" class=\"btn btn-default\">Create</button>
</form>       
        ";
    }
    public static function delete_user($data=null)
    {
        echo "<button type=\"button\" onclick=\"delete_user('$data')\">Delete</button>";


    }
    public static function change_role_user($data=null)
    {
        echo "<button type=\"button\" onclick=\"change_role_user('$data')\">Change role</button>";
        /*
        echo "
        <form action=\"/user/change_role\" param = \"value\" method=\"POST\">
                <button  type=\"submit\" class=\"btn btn-primary\" name =\"id\" value=\"$data\">Change role</button>
        </form>";*/
    }
    public static function check_user($data=null)
    {
        echo "
        <form action=\"/major/show_user\" param = \"value\" method=\"POST\">
                <button  type=\"submit\" class=\"btn btn-primary\" name =\"id\" value=\"$data\">Show</button>
        </form>
                ";
    }

}