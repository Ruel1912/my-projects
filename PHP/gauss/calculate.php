<?php
    $equations = $_GET['equations']; // Количество уравнений и переменных
    $matrix = array(); 
    
    // Заполнение матрицы коэффициентов
    for ($i = 0; $i < $equations; $i++) {
      $matrix[$i] = array();
      
      for ($j = 0; $j <= $equations; $j++) {
        $coef = $_POST["coef_$i$j"];
        $matrix[$i][$j] = $coef;
      }
    }

    // Размер матрицы
    $n = count($matrix);

    // Прямой ход метода Гаусса
    for ($i = 0; $i < $n; $i++) {
        $pivot = $matrix[$i][$i];
        for ($j = $i; $j < $n + 1; $j++) {
            if (($matrix[$i][$j] == 0) || ($pivot == 0)) {
                continue;
            } else {
                $matrix[$i][$j] /= $pivot;
            }
        }
        for ($k = $i + 1; $k < $n; $k++) {
            $factor = $matrix[$k][$i];
            for ($j = $i; $j < $n + 1; $j++) {
                $matrix[$k][$j] -= $factor * $matrix[$i][$j];
            }
        }
    }

    // Обратный ход метода Гаусса
    $x = array_fill(0, $n, 0);
    for ($i = $n - 1; $i >= 0; $i--) {
        $x[$i] = $matrix[$i][$n];
        for ($j = $i + 1; $j < $n; $j++) {
            $x[$i] -= $matrix[$i][$j] * $x[$j];
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Калькулятор систем линейных уравнений</title>
</head>

<body>
    <h2>Ответ:</h2>
    <?php for($i = 0; $i < $n; $i++): ?>
    <p>X<sub><?= $i ?></sub> = <?= $x[$i] ?>;</p>
    <?php endfor; ?>
    <a href='index.php'>Решить новое уравнение</a>
</body>

</html>