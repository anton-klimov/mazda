<?php
{

    if(!empty($_POST)){
        //global $_FILES;
        session_start();
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

        if (! $about) {
            $_SESSION['empty_about'] = true;
        } else if (! $title) {
            $_SESSION['empty_title'] = true;
        } else if (! $price) {
            $_SESSION['empty_price'] = true;
        } else if (! $image['name']) {
            $_SESSION['empty_image'] = true;
        } else {
            //Так работать не будет - надо сперва сделать загрузку как в примере
            //$photo = "http://" . $_SERVER['HTTP_HOST'] . "/img/" . basename($_FILES['image']['name']);
            $target_path = "img/";
            $target_path = $target_path . microtime(true) . basename( $_FILES['image']['name']);
            if(! move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                $target_path = "img/grey.png";
            }
            //echo $photo;

    //    if ($about === "") {
    //        die("Empty field");
    //    }
            $curr_date = date('r');
            $add_article_sql = "INSERT INTO articles(user, title, text, price, photoUrl)
                            VALUES (1, '$title', '$about', '$price', '$target_path');";

            if (! mysql_query($add_article_sql)) {
                $_SESSION['title'] = $title;
            } else {
                unset($_POST['about']);
                unset($_POST['title']);
                unset($_POST['price']);
                unset($_POST['image']);
                $_SESSION['added'] = true;
            }
        }
    }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Официальный сайт Mazda</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="main_block">
    <div class="header border">
        <img src="img/mazda_logo_vi.png" width="199px" height="203px" alt="logo" onmouseup="window.open('http://localhost/index.php', '_self')">
    </div>
    <div style="margin-top:5px; width: 100%;">
        <div style="background-color: rgb(255, 255, 255); width: 100%; margin-bottom:10px; padding: 10px;" class="border">
            <form action="" enctype="multipart/form-data" method="post">
                <label for="title">Заголовок</label>
                <input type='text' id='title' name='title' value=<?php echo $_POST['title']; ?>><br/>
                <label for="price">Цена, грн</label>
                <input type='text' id='price' name='price' value=<?php echo $_POST['price']; ?>><br/>
                <label for="image">Изображение</label>
                <input type="file" accept="image/*" name="image" id="image"/><br/>
                <label for="about">Описание</label>
               <textarea rows='15' cols='100' name='about' id='about'><?php echo "$_POST[about]"; ?></textarea>
                <input type="submit" value="Создать"/>
            </form>
            <?php
            {
//                session_start();
                $text = "";
//                if ($_POST) {
                    if ($_SESSION['added']) {
                        unset($_SESSION['added']);
                        $text = "Товар успешно добавлен";
                    } else if ($_SESSION['empty_title']) {
                        unset($_SESSION['empty_title']);
                        $text = "Пустой заголовок";
                    } else if ($_SESSION['empty_about']) {
                        unset($_SESSION['empty_about']);
                        $text = "Пустое описание";
                    }
                    else if ($_SESSION['empty_price']) {
                        unset($_SESSION['empty_price']);
                        $text = "Пустая цена";
                    }
                    else if ($_SESSION['empty_image']) {
                        unset($_SESSION['empty_image']);
                        $text = "Пустое изображение";
                    } if (! ($_SESSION['title'] === "")) {
                        $sql_get_article = "SELECT id FROM articles WHERE title='" . $_SESSION['title'] . "';";
                        $res = mysql_query($sql_get_article);
                        if ($res) {
                            $row = mysql_fetch_array($res);
                            if ($row) {
                                $text = "Товар с таким именем уже существует";
                            }
                            unset($_SESSION['title']);
                        }

//                    }
                    echo "<p style='width: 100%; margin-top: 10px; margin-bottom:10px; text-align: center; color: red;'>$text</p>";
                }
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