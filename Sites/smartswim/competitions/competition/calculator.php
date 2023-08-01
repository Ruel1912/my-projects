<!DOCTYPE html>
<html lang="ru">

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
$disciplines = $conn->query("SELECT DISTINCT discipline FROM calculator");
$groups = $conn->query("SELECT DISTINCT SUBSTRING(team, 2, 8) AS team_without FROM calculator ORDER BY CAST(SUBSTRING_INDEX(team_without, '-', 1) AS UNSIGNED) ASC;");


// // Открытие CSV файла
// $file = fopen('info.csv', 'r');

// // Чтение и обработка каждой строки файла
// while (($data = fgetcsv($file)) !== false) {
//     // Разделение строки на отдельные значения
//     list($discipline, $team, $distance, $time) = explode("|", $data[0]);
//     $discipline = trim($discipline);
//     $team = trim($team);
//     $distance = trim($distance);
//     $time = trim($time);
//     // echo "INSERT INTO calculator (discipline, team, distance, `time`) VALUES ('$discipline', '$team', '$distance', '$time')";
//     $conn->query("INSERT INTO calculator (discipline, team, distance, `time`) VALUES ('$discipline', '$team', '$distance', '$time')");
// }

// // Закрытие файла
// fclose($file);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_discipline = $_POST["discipline"];
    $team = $_POST["gender"].$_POST["team"];
    $distance = $_POST["distance"];
    $time = $_POST["time"];
    // echo "SELECT * FROM calculator WHERE discipline = '$user_discipline' AND team = '$team' AND distance = '$distance'";
    $base_time = $conn->query("SELECT * FROM calculator WHERE discipline = '$user_discipline' AND team = '$team' AND distance = '$distance'");
    if (mysqli_num_rows($base_time) > 0) {
        $base_time = mysqli_fetch_assoc($base_time)['time'];

        $base_time = explode(":", $base_time);
        $time = explode(":", $time);

        $base_result = floatval($base_time[0]) * 60 + floatval($base_time[1]) + floatval($base_time[2]) / 100;
        $user_result = floatval($time[0]) * 60 + floatval($time[1]) + floatval($time[2]) / 100;

        $result = round(($base_result / $user_result) ** 3 * 1000);
    } else {
        $result = "нет очков";
    }
}
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png" />
  <link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon" />
  <link rel="manifest" href="/favicon/site.webmanifest" />
  <title>Калькулятор расчета результата по плаванию</title>
  <link rel="stylesheet" href="/base.css">
  <link rel="stylesheet" href="/components/form.css">
  <link rel="stylesheet" href="./calculator.css">
</head>

<body>
  <?php require($_SERVER['DOCUMENT_ROOT']."/components/header.php") ?>
  <main class="main">
    <section class="promo">
      <div class="container">
        <div class="cards">
          <div class="card">
            <div class="card-header">
              <h2 class="card__title title">Калькулятор расчета результата по плаванию</h2>
            </div>
            <form class="card-body" method="post" action="">
              <div class="card-body__inner">
                <div class="card-body__left">
                  <div class="select">
                    <div class="select__header">
                      <p>Дисциплина</p>
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.08004 8.94995L10.6 15.47C11.37 16.24 12.63 16.24 13.4 15.47L19.92 8.94995"
                          stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                      </svg>
                    </div>
                    <div class="select__content">
                      <?php foreach($disciplines as $discipline): ?>
                      <p><?= $discipline['discipline'] ?></p>
                      <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="discipline">
                  </div>
                  <div class="form__row">
                    <div class="form__gender">
                      <h3>Пол:</h3>
                      <label class="custom-checkbox">
                        <input type="radio" checked name="gender" value="M" class="form-agree" required="">
                        <span class="checkbox-icon"></span>
                        <span class="checkbox-label">Мужчина</span>
                      </label>
                      <label class="custom-checkbox">
                        <input type="radio" name="gender" value="F" class="form-agree" required="">
                        <span class="checkbox-icon"></span>
                        <span class="checkbox-label">Женщина</span>
                      </label>
                    </div>
                    <div class="form__distance">
                      <h3>Бассейн:</h3>
                      <label class="custom-checkbox">
                        <input type="radio" checked name="distance" value="25 м" class="form-agree" required="">
                        <span class="checkbox-icon"></span>
                        <span class="checkbox-label">25 м</span>
                      </label>
                      <label class="custom-checkbox">
                        <input type="radio" name="distance" value="25 м" class="form-agree" required="">
                        <span class="checkbox-icon"></span>
                        <span class="checkbox-label">50 м</span>
                      </label>
                    </div>
                  </div>

                </div>
                <div class="card-body__right">
                  <div class="select">
                    <div class="select__header">
                      <p>Группа</p>
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.08004 8.94995L10.6 15.47C11.37 16.24 12.63 16.24 13.4 15.47L19.92 8.94995"
                          stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                      </svg>
                    </div>
                    <div class="select__content">
                      <?php foreach($groups as $group): ?>
                      <p><?= $group['team_without'] ?></p>
                      <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="team">
                  </div>
                  <input class="time" type="text" name="time" placeholder="Результат:(ММ:СС:мс)" required
                    pattern="[0-9]{2}:[0-9]{2}\:[0-9]{2}" title="Введите время в формате ММ:СС:мс">
                </div>

              </div>

              <div class="card-body__control">
                <button type="submit" class="button calculate">Рассчитать</button>
                <button type="reset" class="button reset" onclick="location.reload()">Сбросить</button>
              </div>

            </form>
          </div>
          <?php if(!empty($result)): ?>
          <div class="card">
            <div class="card-header">
              <h2 class="card__title title">Результат: <?= $result ?></h2>
              <?php if($result != "нет очков"): ?>
              <div class="result-col">
                <div class="result_row">
                  <span>Дисциплина:</span>
                  <span><?= $user_discipline ?> - <?= $team ?></span>
                </div>
                <div class="result_row">
                  <span>Бассейн:</span>
                  <span><?= $distance ?></span>
                </div>
                <div class="result_row">
                  <span>Базовый результат:</span>
                  <span><?= implode(":", $base_time) ?></span>
                </div>
                <div class="result_row"> <span>Расчетный результат:</span>
                  <span><?= implode(":", $time) ?></span>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>
  <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
  <script src="/js/select.js"></script>
</body>

</html>