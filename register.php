<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Регистрация</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="main_block">
    <div class="header border">
        <img src="img/mazda_logo_vi.png" width="199px" height="203px" alt="logo" onmouseup="window.open('http://localhost/index.php', '_self')">
    </div>
    <div class="main_text_block border" style="width: 100%; margin-top: 5px;">
        <form style="margin:15px 15px 15px 15px; width:360px;" method="post" action="" enctype="multipart/form-data">
            <div class="row"><label for="login" style="float:left;">Логин</label>
                <input type="text" class="register" id="login" name="login" value=<?php// if (! $_SESSION['added']) echo $_POST['login']; ?>></div>
            <div class="row"><label for="pass1" style="float:left;">Пароль</label>
                <input type="password" class="register" id="pass1" name="password"></div>
            <div class="row"><label for="pass2" style="float:left;">Повторите пароль</label>
                <input type="password" class="register" id="pass2"></div>
            <div class="row"><label for="email" style="float:left;">Электронная почта</label>
                <input type="text" class="register" id="email" name="email" value=<?php //if (! $_SESSION['added']) { echo $_POST['email']; $_SESSION['added'] = false; }?>></div>
            <input name="reg" type="submit" style="float: left; margin: 10px 10px 10px 100px" value="Регистрация">
        </form>
        <div style="float:left; margin-top:70px;"><?php
            if (! empty($_POST['reg'])) {
                if (! empty($_POST['reg'])) $login = @$_POST['login']; else {
                    $error = true;
                    echo "Ведите логин<br>";
                }
                if (! empty($_POST['password'])) $password = @$_POST['password']; else {
                    $error = true;
                    echo "Ведите пароль<br>";
                }
                if (!empty($_POST['email'])) $email = @$_POST['email']; else {
                    $error = true;
                    echo "Ведите адресс электронной почты<br>";
                }
                if (preg_match('%[^a-z_0-9-]%', $login)) {
                    echo "Неверный формат логина<br>";
                    echo $login;
                    $error = true;
                }
                if (preg_match('%[^a-z_0-9-]%', $password)) {
                    echo "Неверный формат пароля<br>";
                    $error = true;
                }
                if (!preg_match('%^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,4}$%', $email)) {
                    echo "Неверный формат адресса электронной почты<br>";
                    $error = true;
                }
                if (! $error) {
                    $host = 'localhost';
                    $user = 'root';
                    $passwd = '';

                    $dbname = 'mazda';
                    $link = mysql_pconnect($host, $user, $passwd) or die('Could not connect to database');
                    mysql_select_db($dbname) or die('Could not select database');
                    $query = "INSERT INTO users (name, password, email) VALUES ('" . $login
                        . "','" . $password . "','" . addslashes($email) . "');";
//                    echo $query;
                    if (mysql_query($query)) {
                        unset($_POST['login']);
                        unset($_POST['email']);
                        unset($_POST['password']);
                        echo "Регистрация завершена";
                    } else {
                        die (mysql_error());
                    }
                }
            } else {
                echo "Введите данные на предыдущей странице<br>";
            }
            ?>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="bottom border">
        <p style="margin-top:9px;"> Сайт &copy; 2011  <a href="mailto:rufus-90@mail.ru">Web-master</a></p>
    </div>
</div>
</body>
</html>

