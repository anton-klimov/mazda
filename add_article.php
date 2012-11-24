<?php
{
    $db_name = 'mazda';

    $link = mysql_pconnect('localhost', 'root', '');
    if (! $link) {
        die('Could not connect' . mysql_error());
    }

    if (!mysql_select_db($db_name)) {
        die("Could not connect to database");
    }

    $about = $_POST['about'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

//    if ()
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Добавление продукта</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="price">
            <label for="price">Цена, грн</label>
            <input type="text" id="price" name="price"/>
            <label for="about">Описание</label>
            <textarea rows="15" name="about" id="about"></textarea>
            <label for="image"></label>
            <input type="file" name="image" id="image"/>
        </form>
    </body>
</html>