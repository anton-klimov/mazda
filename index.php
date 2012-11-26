<?php
    session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Официальный сайт Mazda</title>
		
		<link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript">
            function addArticle() {
                window.open("./add_article.php","_self");
            }

            function addProduct(id) {
                window.open("./add_product.php?id=" + id,"_self");
            }
        </script>
	</head>
	<body>
		<div class="main_block">
			<div class="header border">
                <?php
                {
                    session_start();
                    $query = "";
                    $total = 0;

                    if (isset($_SESSION['products'])) {
                        foreach ($_SESSION['products'] as $i => $val) {
                            $query = $query . "id=$i OR ";
                        }
                    }

                    if ($query && isset($_SESSION['products'])) {
                        $query = substr($query, 0, strlen($query) - 4);
                        $sql_get_selected_products = "SELECT id, price FROM articles WHERE " . $query . ";";

                        $db_name = 'mazda';
                        $link = mysql_pconnect('localhost', 'root', '');
                        if (! $link) {
                            die('Could not connect' . mysql_error());
                        }
                        if (! mysql_select_db($db_name)) {
                            die("Could not connect to database");
                        }

                        $result = mysql_query($sql_get_selected_products, $link);
                        while ($row = mysql_fetch_array($result)) {
                            $total = $total + $_SESSION['products'][$row['id']] * $row['price'];
                        }
                    }

                    echo "
                    <div style='float: right; margin-right: 20px; margin-top: 20px; width: 200px;
                            border: black 2px solid; vertical-align: top; background-color: gray;'>
                        <div style='text-align: center; width: 100%;'><a href='http://localhost/basket.php'>Корзина</a></div>
                        <div style='margin-bottom: 5px; margin-left: 5px;'>Общая стоимость - $total</div>
                    </div>
                ";
                }
                ?>
                <img src="img/mazda_logo_vi.png" width="199px" height="203px" alt="logo" onmouseup="window.open('http://localhost/index.php', '_self')">
            </div>
			<div style="margin-top:5px; width: 100%;">
				<div class="some_left_block">
					<div style="background-color: rgb(255, 255, 255); width: 100%; margin-bottom: 20px;" class="border">
						<ul style="list-style-type: none; margin-left: -30px;">
                            <li><a class="test" href="index.php">Главная</a></li>
                            <?php
                            $db_name = 'mazda';

                            $link = mysql_pconnect('localhost', 'root', '');
                            if (! $link) {
                                die('Could not connect' . mysql_error());
                            }

                            if (! mysql_select_db($db_name)) {
                                die("Could not connect to database");
                            }

                            $get_articles = "SELECT id, title FROM articles;";
                            $result = mysql_query($get_articles);
                            if (! $result) {
                                die("Could not get articles");
                            }

                            while ($row = mysql_fetch_array($result)) {
                                echo "<li><a class='test' href='index.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></li>";
                            }
                            ?>
						</ul>
					</div>
					<div style="background-color: rgb(255, 255, 255); width: 100%; margin-bottom: 20px;" class="border">
                        <?php
                        {
                            $unauthorized = "<p style=\"margin-bottom:25px; text-align: center;\">Авторизация</p>
                                            <form style=\"text-align: center; margin-bottom: 20px;\" action=\"auth.php\" method=\"post\">
                                                <label for=\"login\">Логин</label>
                                                <input type=\"text\" class=\"input_box\" id=\"login\" name=\"login\">
                                                <label for=\"pass\">Пароль</label>
                                                <input type=\"password\" class=\"input_box\" id=\"pass\" name=\"pass\"></p>
                                                <input type=\"submit\" value='Войти'>
                                            </form>";
//                            @session_start();
//                            @session_destroy();
                            $db_name = 'mazda';
                            $link = mysql_pconnect('localhost', 'root', '');
                            if (! $link) {
                                die('Could not connect' . mysql_error());
                            }
                            if (! mysql_select_db($db_name)) {
                                die("Could not connect to database");
                            }
                            $access_token = "0";
                            if (isset($_SESSION['access_token'])) {
                                $access_token = $_SESSION['access_token'];
                                $sql_get_user = "SELECT name, access_token FROM users WHERE access_token=" ."'"
                                    . $access_token . "';";
                                if (! $result = mysql_query($sql_get_user, $link)) {
                                    die("Could not get user" . mysql_error());
                                }
                                $row = mysql_fetch_array($result);
                                if (! $row) {
                                    echo $unauthorized;
                                } else {
                                    $username = $row['name'];
                                    echo "<p style=\"text-align: center; font-size: 14pt;\">Добро пожаловать $username</p>
                                                <form style=\"text-align: center\" action=\"logout.php\">
                                                    <input type=\"submit\" value=\"Выход\"/>
                                                </form>
                                                <input style=\"margin-bottom: 10px;\" type=\"submit\" value=\"Добавить статью\" onmouseup='addArticle()'/>
                                                ";
                                }
                            } else {
                                echo $unauthorized;
                            }
                        }
                        ?>
					</div>
				</div>
				<div class="main_text_block border">
                    <?php
                        if (! isset($_GET['id'])) {
                            echo "<p class='bold' style='text-align:center; margin-top:10px; margin-bottom:20px; font-size:20pt;'> История возникновения марки Mazda</p>
                                <img src='img/image005.jpg' width='450px' height='300px' style='margin: 0px 10px 0px 10px; float: left;''>
                                <p> <span class='bold'>Mazda Motor Corporation</span> – это компании, входящая в группу Сумитомо, базируется в Хиросиме, Япония, и выпускает легковые автомобили, автобусы, грузовики, микроавтобусы.</p>
                                <p>В 1920 году эта компания всего лишь была маленьким производством по переработке пробки. Трудно тогда было представить, какое её ждет будущее. В 1927 году она получила название Toyo Koguo Co Ltd. В 1931 она дошла до изготовления машин с тремя колёсами. Довольно высоким спросом пользовались мотороллеры на трех колесах, которые применялись для перевозки грузов. За четверть века компании удалось продать 200000 экземпляров. Вторая мировая война, конечно же, отразилась и на этом производстве, однако они отделались лишь выпуском этих самых мотороллеров. Все наверняка помнят печальные события, связанные с бомбардировкой Хиросимы и Нагасаки, однако заводы, производящие продукцию Toyo Koguo Co Ltd., не были повреждены бомбами.</p>
                                <p>Когда война закончилась, руководство компании приняло решение заняться чем-то более серьезным, и конструкторы начали разрабатывать проекты первого автомобиля. Сначала это были грузовики, но в 1960 году был выпущен и первый легковой автомобиль R360 Coupe, у него было две двери, в двигателе было всего 2 цилиндра, и объем его был совсем маленький – 356 см3. Это был очень простенький автомобильчик, очень дешевый. Через два года выпустили уже автомобиль, у которого было 4 двери, модель называлась Mazda Corol 600. В 1964 году вышли первые Mazda Familia, и в этом же году начался первый экспорт авто компании в самую пользующуюся спросом на автомобили страну – США.</p>
                                <p>В 1965 появляется первый пикам модели Mazda Proceed. В 1967 году в продажу вышел автомобиль с роторным двигателем Ванкеля Mazda Cosmo Sports. С 1971 года он начал экспортироваться в страны Европы. Мазда заключает контракт о совместной деятельности с Kia Motors Corp в 1967, и Киа начинает собрать их автомобили. Через год появляется еще один автомобиль из линейки Mazda Familia - Rotary Coupe. Экспортировать его стали только через 2 года, и в Соединенные штаты. В 1970 появляется прототип Mazda Capella RX-2. Затем два года подряд появляются Mazda Savanna RX-3 и Mazda Luce RX-4.1977 – выход Mazda Familia Original GLC/323. Через год - Mazda Savanna RX-7.</p>
                                <p>В 1979 Ford Motor купил четверть акций компании, с этого началось её сотрудничество с Mazda. Через год презентуется прототип FWD Mazda Familia 4 WD, который назван Японским автомобилем года. В 1981 году множество автомобилей начинают использовать двигатель Ванкеля, в Америке Mazda становится очень популярной, а потому для облегчения деятельности открыли Mazda North America, Inc., отделение в Соединенных Штатах. Mazda начинает производить более дорогие автомобили, выходят спортивные модели. Mazda RX-7 становится одним из самых лучших автомобилей, легкая и оригинальная модель.</p>
                                <p>В 1981 выходит Mazda Сosmo/Luce, через год презентуется Mazda Capella4 WD, которая становится Японским автомобилем года. В следующем году американский журнал «Мотор тренд» указывает, что этот автомобиль является «импортным автомобилем года».</p>
                                <p>В 1984 появляется название Mazda Motor Corporation. Через год появляется новая модернизированная Mazda Luce. В 1987 выходит Mazda Savanna RX-7. Наконец начинают выходить автомобили с американского завода Мазда Мотор Мануфактура, и тут же презентуется Ford Festiva. В 1988 на заводе в Штатах начинается выпуск Mazda MPV.</p>
                                <p>В начале 90-ых выходит Eunos Cosmo с системой навигации и Autozam Revue. В 1992 один из автомобилей Мазда - Mazda 626 снова становится автомобилем года. В 1998 появляется Mazda 323, в Европе продается с успехом Mazda Demio. Надо сказать, что модель от Мазда MX-5 Roadster занесли в книгу рекордов Гиннеса, в качестве наиболее популярного спортивного родстера. Появляется авто и в нише внедорожников - Mazda Tribut. В Детройте выставляется RX-Evolve, по прототипу которого позже выходит RX-8.</p>
                                <p>2001 год стал годом модификаций, многие модели были выпущены еще и в спортивном кузове. К тому же в Токио выставляются Atenza и RX-8 с двигателем Renesis. Roadster удостаивается приза Auto Color Award 2001.</p>
                                <p>Сейчас у Мазда огромное предложение, тут есть модели на любой вкус и цвет с разнообразными тапами кузова и техническими характеристиками. Есть автомобили с малым объемом двигателей, а также модели представительского класса с типом кузова седан. Внедорожники не отстают, пользуются повышенным спросом. Спортивный автомобиль RX-8 поразил потребителей своим дизайном и мощность, что обуславливает высокий уровень продаж. Всего импортерами этой марки является 120 государств мира. При этом в 21 из них у нее есть собственные заводы для сборки.</p>
                                ";
                        } else {
                            $db_name = 'mazda';
                            $link = mysql_pconnect('localhost', 'root', '');
                            if (! $link) {
                                die('Could not connect' . mysql_error());
                            }
                            if (!mysql_select_db($db_name)) {
                                die("Could not connect to database");
                            }

                            $id = $_GET['id'];
                            $sql_get_article = "SELECT * FROM articles WHERE id=" . $id . ";";
                            $row = mysql_fetch_array(mysql_query($sql_get_article));
                            if (! $row) {
                                echo "Bad id";
                            } else {
                                echo "
                                <div style='width: 100%;'>
                                <p class='bold' style='float: left; width: 60%; text-align:center; margin-top:10px; margin-bottom:20px; font-size:20pt;'>" . $row['title'] . "</p>
                                <p class='bold' style='float: right; max-width: 35%; text-align:center; margin-top:10px; margin-bottom:20px; margin-right: 10px; font-size:22pt; color: green;'> Цена - " . $row['price'] . " грн.</p></div>
                                <img src='". $row['photoUrl'] ."' width='450px' height='300px' style='margin: 0px 10px 0px 10px; float: left;'>
                                <p style='margin: 10px;'>" . $row['text'] . "<p/>
                                <input style='margin-left: 10px;' type='submit' value='Добавить в корзину' onmousedown='addProduct(". $id .")'/>

                            ";
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