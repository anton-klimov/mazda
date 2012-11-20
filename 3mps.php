<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
	if (!empty($_POST['sbm']))
	{
		$paramLogin = trim($_POST['login']);
		$paramMsg = trim($_POST['msg']);
		if (empty($paramLogin)){$login = "Anonim";}else{$login = $_POST['login'];}
		if  (!empty($paramMsg))
		{
			$link = mysql_pconnect('localhost', 'root', '');
			mysql_select_db('mazda');
			mysql_query("INSERT INTO Comments (user, commentsPage, comments) VALUES ('". addslashes($login) ."','6S','" .addslashes($_POST['msg'])."');");
		}
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Mazda 3 MPS</title>
		
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<div class="main_block">
			<div class="header border">
				<img src="img/mazda_logo_vi.png" width="199px" height="203px">
			</div>
			<div style="margin-top:5px; width: 100%;">
				<div class="some_left_block">
					<div style="background-color: rgb(255, 255, 255); width: 100%; margin-bottom: 20px;" class="border">
						<ul style="list-style-type: none; margin-left: -30px;">
							<li><a class="test" href="index.html">Главная</a></li>
							<li><a class="test" href="6S.php">Mazda 6 Sedan</a></li>
							<li><a class="test" href="3MPS.php">Mazda 3 MPS</a></li>
							<li><a class="test" href="RX8.php">Mazda RX-8</a></li>
							<li><a class="test" href="CX7.php">Mazda CX-7</a></li>
						</ul>
					</div>
					<div style="background-color: rgb(255, 255, 255); width: 100%; margin-bottom: 20px;" class="border">
						<p style="margin-bottom:25px; text-align: center;">Авторизация</p>
						<form style="text-align: center; margin-bottom: 20px;">
							<label for="login">Логин</label>
							<input type="text" class="input_box" id="login">
							<label for="pass">Пароль</label>
							<input type="password" class="input_box" id="pass"></p>
							<input type="submit">
						</form>
					</div>
				</div>
				<div class="main_text_block border">
					<img src="img/image002.jpg" width="450px" height="329px" style= "margin: 10px 10px 10px 10px; float: left;">
					<p style="font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px;">Mazda 3 MPS</p>
					<p>Mazda3 MPS (Мазда3 MPS) - спортивная модификация переднеприводного хэтчбека класса «С». Мировая премьера рестайлинговой версии второго поколения модели состоялась в феврале 2011 года на автосалоне в Торонто.</p>
					<p>Изменения в MPS коснулись, по большей части, внешности и интерьера, да и то незначительно. Автомобиль получил обновленные бамперы, несколько новых материалов отделки салона, серебряные декоративные в ставки «под алюминий» на торпедо и бело-голубую подсветку приборов и дисплея вместо красной.</p>
					<p>Техническая часть Мазда3 MPS, в отличие от «гражданского» хэтчбека, осталась такой же, как до рестайлинга. Автомобиль по-прежнему комплектуется 18-дюймовыми легкосплавными дисками, системой стабилизации (ESP), антиблокировочной системой (ABS), шестью подушками безопасности и полным электропакетом. Инновационных «зеленых» технологий Skyactiv у версии MPS нет.</p>
					<p>Под капотом Mazda3 MPS установлен 2,3-литровый бензиновый двигатель DISI с турбонаддувом. Его мощность равна 260 л. с., а максимальный крутящий момент - 3801 Нм при 3000 об/мин. С таким мотором автомобиль разгоняется до первой «сотни» за 6,1 секунды, а максимальная скорость «заряженного» хэтча равна 250 км/час, расходуя, при этом, 9,6 литра бензина на 100 км пути в смешанном цикле. Кстати, такой же двигатель, как у Mazda3 MPS, устанавливается на Mazda6 MPS, а в дефорсированном варианте еще и на модель CX-7.</p>
					<p>Производство Mazda3 налажено на заводах в Японии, Малайзии, Таиланде, Колумбии и Южной Африке. В Северной Америке MPS-версия продается как Mazdaspeed3, в Японии - как Mazdaspeed Axela.</p>				
				</div>
				<div class="main_text_block border" style="min-height:215px;">
					<p style="font-size:14pt; text-align: center;">Оставить комментарий</p>
					<form method="post" action="3mps.php#form" style="margin-left:10px;" id="form">
						<label for="login" style="float:left; margin-right:80px;">Логин</label>
						<input type="text" class="register" id="login" name="login"><br>
						<label for="txtArea" style="margin-top:5px; margin-bottom:5px; margin-right:15px;">Текст комментария<label>
						<?php 
							$msg = trim($_POST['msg']);
							if (!empty($_POST['sbm']) && empty($msg)) echo '<font color="red" style="margin-left:20px;"> Введите текст комментария</font>';
						?>
						<textarea rows="5" style="width:90%;" name="msg" id="txtArea"> </textarea>
						<input type="submit" name="sbm" value="Отправить" style="margin-top:8px;">
					</form>
				</div>
				<?php
					$link = mysql_pconnect('localhost', 'root', '');
					mysql_select_db('mazda');
					$result = mysql_query("SELECT * FROM Comments WHERE commentsPage='3mps' ORDER BY id DESC;");
					while($row = mysql_fetch_array($result))
					{
						echo '<div class = "border main_text_block" style="min-height:5px;">';
						echo '<p style="font-size:14px; font-weight:bold;">'.$row['user'].':</p>';
						echo '<p style="font-size:12px">'.$row['comments'].'</p>';
						echo '</div>';
					}					
				?>				
			</div>
<div style="clear: both;"></div>
			<div class="bottom border">
				<p style="margin-top:9px;"> Сайт &copy; 2011  <a href="mailto:rufus-90@mail.ru">Web-master</a></p>
			</div>
		</div>	
	</body>
</html>