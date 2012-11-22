<?php
    $login=$_POST['login'];
    $password = $_POST['pass'];

    $db_name = 'mazda';

    $link = mysql_pconnect('localhost', 'root', '');
    if (! $link) {
        die('Could not connect' . mysql_error());
    }

    $sql_get_user = "SELECT * FROM users WHERE name=" ."'" . $login . "' AND password=" . "'" . $password . "'";
    if (! $result = mysql_query($sql_get_user, $link)) {
        die("Could not get user" . mysql_error());
    }

    if ($row = mysql_fetch_array($result)) {
        echo "$login<br>";
        echo $password;
    }

    mysql_close($link);
?>