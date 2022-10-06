<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body>
	<div class="container">
		<?
		$number = $_POST['number'];
		if ($number) {
			for($i = 0; $i < $number; $i++) {
			?><p><?= rand(1, 999) ?></p><?;
			}	
		}
		?>
	</div>
	<h1>Всего: <?= round($number, 0) ?><h1>
</body>
</html>
