<form action="/user_bd/add_user" param = "value" method="POST">
    <a href="/user_bd/add_user"></a>

    Login: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    Role: <select name="roles" size="1">
        <option value="user">User</option>
        <option value="editor">Editor</option>
    </select>
    <br>
    <input type="submit" value = "Create user">
</form>



<!--
<form action="user_bd/add_new_user" param = "value" method="POST">
           <a href="user_bd/add_new_user"></a>
           Login: <input type="text" name="username"><br>
           Password: <input type="text" name="password"><br>
           Role: <input type="text" name="role"><br>
           <input type="submit" value = "Create user">
</form>

        <form action="user_bd/get_users" param = "value" method="POST">
            <a href="user_bd/get_users"></a>
            <input type="submit" value = "Show users">
        </form>
        <form action="user_bd/set_role" param = "value" method="POST">
            <a href="set_role"></a>
            Login: <input type="text" name="username"><br>
            New role: <input type="text" name="role"><br>
            <input type="submit" value = "Set new role">
        </form>
        <form action="user_bd/delete_user" param = "value" method="POST">
            <a href="user_bd/delete_user"></a>
            Login: <input type="text" name="username"><br>
            <input type="submit" value = "Delete this asshole!">
        </form>
-->