<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="saper.css">
</head>
<header>
	<div class="container" onclick="menuIcon(this)">
		<div class="bar1"></div>
		<div class="bar2"></div>
		<div class="bar3"></div>
	</div>
	<div class="menu">Настройки</div>
</header>

<body>
	<div class="maincont">
		<div class="gameField"></div>
		<div class="settings">
			<div class="sth">
				<input type="checkbox" name="" id="saveFirstStep" checked="true">Безопасный первый ход
			</div>
			Режим сложности:
			<div class="sth"><input type="checkbox" name="" id="easyLevel" checked="true">Легкий</div>
			<div class="sth"><input type="checkbox" name="" id="mediumLevel" checked="true">Средний</div>
			<div class="sth"><input type="checkbox" name="" id="hardLevel" checked="false">Тяжелый</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="saper.js"></script>

</html>