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

				$result = mysql_query("SELECT id FROM user WHERE login='$login'",$db);
				$myrow = mysql_fetch_array($result);
				if (!empty($myrow['id'])) {
				exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

			mysql_query("INSERT INTO Comments (user, commentsPage, comments) VALUES ('". addslashes($login) ."','6S','" .addslashes($_POST['msg'])."');");

		}

	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Mazda RX-8</title>
		
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
					<img src="img/image003.jpg" width="450px" height="329px" style= "margin: 10px 10px 10px 10px; float: left;">
					<p style="font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px;">Mazda RX-8</p>
					<p>Mazda RX-8 (Мазда RX-8) - автомобиль, удивительный во всех отношениях. Его эффектный обтекаемый кузов отличается отсутствием заметных зазоров между частями. Конструктивные детали, напоминающие о роторном двигателе, присутствуют повсюду - на ручке рычага переключения передач, подголовниках, даже на стоп-сигналах. Это исключительное внимание к мелочам также проявляется в оформлении моторного отсека.</p>
					<p>Мазда RX-8 получил обновленную переднюю и заднюю оптику, изменённые бамперы, а сзади крупные выхлопные патрубки. Внутри слегка переделана передняя панель, а взглянув на комбинацию приборов, отныне можно понять, прогрелся двигатель до нужной температуры или ещё нет. </p>		
					<p>Конструкторы Mazda RX-8 утверждают, что благодаря изменённому профилю сидений, Вы ощутите куда больший комфорт и не будут сильно уставать в дальней дороге. К тому же, они не забыли и про комфорт задних пассажиров. Ибо спинки передних сидений сделаны так, чтобы обитателям «галёрки» было куда пристроить свои коленки.</p>		
				</div>
				<div class="main_text_block border" style="min-height:215px;">
					<p style="font-size:14pt; text-align: center;">Оставить комментарий</p>
					<form method="post" action="rx8.php#form" style="margin-left:10px;" id="form">
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
					$result = mysql_query("SELECT * FROM Comments WHERE commentsPage='rx8' ORDER BY id DESC;");
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
<!-- CreATE TABLE Comments(id int unsigned auto_increment, user varchar(20), commentsPage varchar(5), comments varchar(500) not null, primary key (id));-->

</html>

