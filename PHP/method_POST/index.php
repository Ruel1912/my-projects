<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POST</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="content">
		<form action="post.php" method="POST">
			<p>Введите количество чисел:</p>
			<input required type="number" name="number" min="1">
			<p><input type="submit" name="submit" value="Перейти и вывести числа"></p>
		</form>
	</div>
</body>
</html>  