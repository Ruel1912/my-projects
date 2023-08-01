<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Калькулятор систем линейных уравнений</title>
</head>

<body>
    <h2>Решить систему линейных уравнений методом Гаусса</h2>
    <form action="process.php" method="POST">
        <label for="equations">Количество неизвестных величин в системе:</label>
        <select name="equations">
            <option value="2">2</option>
            <option value="3" selected>3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <br />
        <br />
        <input type="submit" value="Далее" />
    </form>
</body>

</html>