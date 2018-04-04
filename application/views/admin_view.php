<?php
    include 'application/views/main_functions.php';
?>
<ul>
    <li>
        <form action="major/users" param = "value" method="POST">
            <a href="major/users"></a>
            <input type="submit" value = "Manage users">
        </form>
    </li>
    <li>
        <form action="major/flinks" param = "value" method="POST">
            <a href="major/flinks"></a>
            <input type="submit" value = "Manage links">
        </form>
    </li>
    <li>
        <form action="major/profile" param = "value" method="POST">
            <a href="major/profile"></a>
            <input type="submit" value = "My links">
        </form>
    </li>
</ul>