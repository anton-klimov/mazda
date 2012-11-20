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
		<title>Mazda CX-7</title>
		
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
					<img src="img/image004.jpg" width="450px" height="329px" style= "margin: 10px 10px 10px 10px; float: left;">
					<p style="font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px;">Mazda CX-7</p>
					<p>Лаконичный и динамичный дизайн с достаточно просторным салоном для пятерых пассажиров Mazda CX-7 (Мазда CX-7) позволяет объединить стиль спортивного автомобиля с практичностью кроссовера.</p>
					<p>Этот спортивный кроссовер выделяется среди остальных благодаря атлетическому дизайну, выполненному в характерном для Mazda стиле. Мягкие текстуры и «умные» функции привносят ощущение роскоши в интерьер салона Mazda CX-7, гармонично сочетаясь с высокотехнологичным характером спортивного кроссовера.</p>
					<p>Как на шоссе, так и на оживленных городских улицах современная технология безопасности Мазда CX-7 обеспечивает непревзойденный уровень защиты.</p>
					<p>Благодаря пропорциям спортивного кроссовера и низкой посадке характерный силуэт Mazda CX-7 невозможно спутать ни с чем. Ведь, сильно наклоненное ветровое стекло и алюминиевые колесные диски - атлетические черты Мазда CX-7 всегда выделяют ее в потоке машин.</p>
					<p>Каждый элемент дизайна прежде всего имеет практическое назначение. Пятиугольная решетка радиатора Mazda CX-7 была расширена для лучшего охлаждения, а большой задний спойлер на крыше призван повысить аэродинамические качества автомобиля.</p>
					<p>Внимание к деталям характерно и для салона автомобиля. Салон Мазда CX-7, предлагаемый в приглушенно черных или песочных тонах, сочетает в себе мягкие текстуры. Например: обитые подлокотники, с современными формами, приборный щиток c двойной крышей и плавным изгибом. Благодаря встроенным переключателям на спортивном рулевом колесе все элементы управления у вас под рукой.</p>
					<p>За рулем Mazda CX-7 трудно поверить, что вы управляете большим спортивным кроссовером - автомобиль легко справляется даже с самыми крутыми поворотами. Так как система полного привода с распределением крутящего момента приспосабливается к дорожным условиям и развивает необходимый крутящий момент для каждой ситуации, передавая мощность на задние колеса для дополнительного тягового усилия. Жесткая подвеска и усилитель руля обеспечивают надежное сцепление с дорогой при переключении передач.</p>
				</div>
				<div class="main_text_block border" style="min-height:215px;">
					<p style="font-size:14pt; text-align: center;">Оставить комментарий</p>
					<form method="post" action="cx7.php#form" style="margin-left:10px;" id="form">
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
					$result = mysql_query("SELECT * FROM Comments WHERE commentsPage='cx7' ORDER BY id DESC;");
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