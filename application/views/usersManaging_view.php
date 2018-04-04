<?php
    include 'application/views/main_functions.php';
?>
<ul>
    <li>
        <form action="user_bd/add_new_user" param = "value" method="POST">
            <a href="user_bd/add_new_user"></a>
            Login: <input type="text" name="username"><br>
            Password: <input type="text" name="password"><br>
            Role: <input type="text" name="role"><br>
            <input type="submit" value = "Create user">
        </form>
    </li>
    <li>
        <form action="user_bd/get_users" param = "value" method="POST">
            <a href="user_bd/get_users"></a>
            <input type="submit" value = "Show users">
        </form>
    </li>
    <li>
        <form action="user_bd/set_role" param = "value" method="POST">
            <a href="set_role"></a>
            Login: <input type="text" name="username"><br>
            New role: <input type="text" name="role"><br>
            <input type="submit" value = "Set new role">
        </form>
    </li>
    <li>
        <form action="user_bd/delete_user" param = "value" method="POST">
            <a href="user_bd/delete_user"></a>
            Login: <input type="text" name="username"><br>
            <input type="submit" value = "Delete this asshole!">
        </form>
    </li>
</ul>