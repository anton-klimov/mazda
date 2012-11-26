<?php
{
    session_start();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Официальный сайт Mazda</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
        function remove_product(id) {
            window.open("./remove_product.php?id=" + id,"_self");
        }
    </script>
</head>
<body>
<div class="main_block">
    <div class="header border">
        <img src="img/mazda_logo_vi.png" width="199px" height="203px" alt="logo" onmouseup="window.open('http://localhost/index.php', '_self')">
    </div>
    <div style="margin-top:5px; width: 100%;">
        <div style="background-color: rgb(255, 255, 255); width: 100%; margin-bottom:10px; padding: 10px;" class="border">
            <?php
            {
                session_start();

                $db_name = 'mazda';
                $link = mysql_pconnect('localhost', 'root', '');
                if (! $link) {
                    die('Could not connect' . mysql_error());
                }
                if (! mysql_select_db($db_name)) {
                    die("Could not connect to database");
                }

                $query = "";
                $total = 0;
                if (isset($_SESSION['products'])) {
                    foreach ($_SESSION['products'] as $i => $val) {
                        $query = $query . "id=$i OR ";
                    }
                }

                if ($query !== "" && isset($_SESSION['products'])) {
                    $query = substr($query, 0, strlen($query) - 4);
                    $sql_get_selected_products = "SELECT id, title, price, photoUrl FROM articles WHERE " . $query . ";";

                    $res = mysql_query($sql_get_selected_products);
                    echo "<table border='1' cellspacing='0' cellpadding='4'>
                            <tr style='font-weight: bold;'>
                                <td>
                                    № п/п
                                </td>
                                <td>
                                    Название
                                </td>
                                <td>
                                    Стоимость
                                </td>
                                <td>
                                    Количество
                                </td>
                                <td>
                                    Удалить
                                </td>
                            </tr>
                        ";
                    $i = 0;
                    $total = 0;
                    $totalCount = 0;

                    while ($row = mysql_fetch_array($res)) {
                        $i = $i + 1;
                        $count = $_SESSION['products'][$row['id']];
                        $total = $total + $count * $row['price'];
                        $totalCount = $totalCount + $count;
                        echo "<tr>
                                <td style='text-align: center'>
                                    $i
                                </td>
                                <td>
                                    $row[title]
                                </td>
                                <td>
                                    $row[price]
                                </td>
                                <td style='text-align: center'>
                                    $count
                                </td>
                                <td style='text-align: center;'>
                                    <input type='submit' value='Удалить' onmouseup='remove_product(". $row['id'] .")'>
                                </td>
                            </tr>";

                    }
                    echo "<td colspan='2' style='text-align: center; font-weight: bold;'>Итого</td><td>$total</td><td style='text-align: center;'>$totalCount</td><td><input type='submit' value='Очистить' onmouseup=\"remove_product(" . "'all'" . ")\"/></td></table>";
                } else {
                    echo "<p style='text-align: center; width: 100%;'>Ваша корзина пуста</p>";
                }

            echo "<p style='width: 100%; margin-top: 10px; margin-bottom:10px; text-align: center; color: red;'>$text</p>";
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
