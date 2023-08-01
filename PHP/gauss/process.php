<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Калькулятор систем линейных уравнений</title>
</head>

<body>
    <h2>Заполните коэффициенты системы уравнений:</h2>
    <?php $equations = $_POST['equations'];   ?>
    <form action="calculate.php?equations=<?= $equations ?>" method="POST">
        <?php for($i = 0; $i < $equations; $i++): ?>
        <div>
            <?php for($j = 0; $j < $equations; $j++): ?>
            <input type='number' name="coef_<?= $i ?><?= $j ?>" required>
            <?php if ($j == $equations - 1): ?>
            <label for="coef_<?= $i ?><?= $j ?>"> x<sub><?= $j ?></sub> = </label>
            <?php else: ?>
            <label for="coef_<?= $i ?><?= $j ?>"> x<sub><?= $j ?></sub> + </label>
            <?php endif; ?>
            <?php endfor; ?>
            <input type='number' name="coef_<?= $i ?><?= $equations ?>" required>
        </div>
        <br>
        <?php endfor; ?>
        <a href="index.php">Назад</a>
        <input type="submit" value="Рассчитать">
    </form>
</body>

</html>