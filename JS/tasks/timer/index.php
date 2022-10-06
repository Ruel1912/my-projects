<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="base.css">
</head>
<body>
<section>
    <div class="time">
        <label for="hour">Часы: </label>
        <input type="number" class="input" name="hour" id="hour" min="0" value="0">
        <link rel="stylesheet" href="style.css">
    </div>
    <div class="time">
        <label for="minute">Минуты: </label>
        <input type="number" class="input" name="minute" id="minute" min="0" value="0">
    </div>
    <div class="time">
        <label for="second">Секунды: </label>
        <input type="number" class="input" name="second" id="second" min="0" step="1" value="0">
    </div>
    <div class="buttons">
        <input class="start" type="submit" value="Старт">
        <input class="stop visually-hidden" type="submit" value="Стоп">
    </div>
</section>
<script src="script.js"></script>
</body>
</html>