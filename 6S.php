<!DOCTYPE HTML PUBLIC "-//W3C**DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Mazda 6 Sedan</title>
		
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
					<img src="img/image001.jpg" width="450px" height="329px" style= "margin: 10px 10px 10px 10px; float: left;">
					<p style="font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px;">Mazda 6 Sedan </p>
					<p>Благодаря обновленному дизайну и улучшенным динамическим характеристикам Mazda6 Sedan (Мазда 6 седан) станет прекрасным выбором для тех, кто ценит в автомобиле энергичность, надежность и элегантность. </p>
					<p>Большинство водителей выбирают Mazda6 Sedan из-за разнообразия вариантов комплектации. Даже модели базового уровня комплектации оснащены тормозной системой, которой обладают более дорогие автомобили представительского класса.</p>
					<p>Мазда 6 седан среднего уровня комплектации оснащен бортовым компьютером, аудиосистемой с 6 динамиками и системой помощи при подъеме (HLA). Модель с самыми высокими техническими характеристиками оснащена оборудованием, которое удовлетворит даже самых взыскательных водителей.</p>
					<p>Кардинальных отличий между старым и обновленном седаном Мазда 6 нет, да их и не должно быть - Mazda 6 и так выглядит вполне достойно. В первую очередь это «поворотники», которые переместились с крыльев на боковые зеркала, и по бамперу, который стал другим. </p>
					<p>Под капот Mazda6 Sedan стоит не только 2,5-литровый агрегат (170 л.с.) и 1,8-литровый мотор (120 л.с.), которые остались без изменений. Появится и новый бензиновый агрегат объемом 2,0 л с непосредственным впрыском топлива серии DISI мощностью 153 л.с. Он придет на смену старому мотору такого же объема, который выдавал 147 л.с. Но главный плюс агрегата серии DISI состоит не в прибавке нескольких лошадей, сколько в снижении расхода топлива и выбросов вредных веществ. Ведь теперь 2,0-литровая Mazda будет тратит всего 6,7 л на 100 км пути.</p>
					<p style="font-size: 16pt; font-weight: bold; text-align: center; margin-top: 20px;">Проложите свой путь - вместе с Mazda6.</p>
					
				</div>
				<div class="main_text_block border" style="min-height:215px;">
					<p style="font-size:14pt; text-align: center;">Оставить комментарий</p>
					<form method="post" action="6S.php#form" style="margin-left:10px;" id="form">
						<label for="login" style="float:left; margin-right:80px;">Логин</label>
						<input type="text" class="register" id="login" name="login"><br>
						<label for="txtArea" style="margin-top:5px; margin-bottom:5px; margin-right:15px;">Текст комментария<label>
						<!--// проверка полей на пустое значение-->
						<?php 
							$msg = trim($_POST['msg']);
							if (!empty($_POST['sbm']) && empty($msg)) echo '<font color="red" style="margin-left:20px;"> Введите текст комментария</font>';
						?>
						<!--добавление комментария в БД-->
						<?php
							if (!empty($_POST['sbm']))
							{
								$errorBadLogin = false;
								$paramLogin = trim($_POST['login']);
								$paramMsg = trim($_POST['msg']);
								if (empty($paramLogin)){$login = "Anonim";} else {$login = $_POST['login'];}
								if  (!empty($paramMsg))
								{
									//проверка на ввод уже существующего логина
									$link = mysql_pconnect('localhost', 'root', '');
									mysql_select_db('mazda');
									
									$result = mysql_query("SELECT id, user FROM Comments WHERE commentsPage='6S' ORDER BY id DESC;");
									while($row = mysql_fetch_array($result))
									{
										if ($row['user']=== $login)
										{
											$errorBadLogin = true;
											break;
										}
									}
									if (! $errorBadLogin) mysql_query("INSERT INTO Comments (user, commentsPage, comments) VALUES ('". addslashes($login) ."','6S','" .addslashes($_POST['msg'])."');"); else echo '<font color="red" style="margin-left:20px;"> Введите новый логин</font>';
								}
							}
						?>
						<textarea rows="5" style="width:90%;" name="msg" id="txtArea"> </textarea>
						<input type="submit" name="sbm" value="Отправить" style="margin-top:8px;">
					</form>
				</div>
				<?php
					$link = mysql_pconnect('localhost', 'root', '');
					mysql_select_db('mazda');
					$result = mysql_query("SELECT * FROM Comments WHERE commentsPage='6S' ORDER BY id DESC;");
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