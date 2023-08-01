<!DOCTYPE html>
<html lang="ru">

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/connect.php");
$disciplines = $conn->query("SELECT DISTINCT discipline FROM calculator");

$razryads = [
    "three_jun" => 'III(ю)',
    "two_jun" => 'II(ю)',
    "one_jun" => 'I(ю)',
    "three" => 'III',
    "two" => 'II',
    "one" => 'I',
    "kms" => 'КМС',
    "ms" => 'МС',
    "msmk" => 'МСМК'
];

// Открытие CSV файла
// $file = fopen('razryad.csv', 'r');

// Чтение и обработка каждой строки файла
// while (($data = fgetcsv($file)) !== false) {
//     // Разделение строки на отдельные значения
//     $row = explode("|", implode(",", $data));
//     $gender = trim($row[0]);
//     $distance = trim($row[1]);
//     $discipline = trim($row[2]);
//     $three_jun = trim($row[3]);
//     $two_jun = trim($row[4]);
//     $one_jun = trim($row[5]);
//     $three = trim($row[6]);
//     $two = trim($row[7]);
//     $one = trim($row[8]);
//     $kms = trim($row[9]);
//     $ms = trim($row[10]);
//     $msmk = trim($row[11]);
//     $conn->query("INSERT INTO calculator_razr VALUES (NULL, '$gender', '$distance', '$discipline', '$three_jun', '$two_jun', '$one_jun', '$three', '$two', '$one', '$kms', '$ms', '$msmk')");
// }

// Закрытие файла
// fclose($file);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_discipline = $_POST["discipline"];
    $gender = $_POST["gender"]; 
    $distance = $_POST["distance"];
    $time = $_POST["time"];
    $times = $conn->query("SELECT msmk, ms, kms, one, two, three, one_jun, two_jun, three_jun FROM calculator_razr 
    WHERE gender = '$gender' AND discipline = '$user_discipline' AND distance = '$distance'");
    if (mysqli_num_rows($times) > 0) {
        $times = mysqli_fetch_assoc($times);
        $time = explode(":", $time);
        $user_result = floatval($time[0]) * 60 + floatval($time[1]) + floatval($time[2]) / 100;

        foreach($times as $k => $v) {
            $razr_time = explode(":", $v);
            $razr_result = floatval($razr_time[0]) * 60 + floatval($razr_time[1]) + floatval($razr_time[2]) / 100;
            if ($user_result < $razr_result) {
                $razryad = $k;
                $index = array_search($razryad, array_keys($times));
                break;
            }
        }
    } else {
        $error = "нет очков";
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
  <title>Калькулятор расчета спортивных разрядов по плаванию</title>
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
              <h2 class="card__title title">Калькулятор расчета спортивных разрядов по плаванию</h2>
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
                      <p>Очки FINA </p>
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.08004 8.94995L10.6 15.47C11.37 16.24 12.63 16.24 13.4 15.47L19.92 8.94995"
                          stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                      </svg>
                    </div>
                    <div class="select__content">
                      <?php for($i = date("Y") - 1; $i >= 2014; $i--): ?>
                      <p><?= $i ?></p>
                      <?php endfor; ?>
                    </div>
                    <input type="hidden" name="fina">
                  </div>
                  <div class="select">
                    <div class="select__header">
                      <p>Разр. ВФП</p>
                      <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.08004 8.94995L10.6 15.47C11.37 16.24 12.63 16.24 13.4 15.47L19.92 8.94995"
                          stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                      </svg>
                    </div>
                    <div class="select__content">
                      <p>2018-2021</p>
                      <p>2014-2017</p>
                    </div>
                    <input type="hidden" name="vfp">
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
          <div class="card">
            <div class="card-header">
              <?php if (empty($error)): ?>
              <div class="result-col">
                <?php if(!empty($razryad)): ?>
                <div class="result_row"> <span>Разряд:</span>
                  <span><?= $razryads[$razryad] ?> <?= $times[$razryad] ?></span>
                </div>
                <?php endif; ?>
                <?php if($index > 0): ?>
                <div class="result_row"> <span>Ближайший разряд:</span>
                  <?php $key = array_keys($times)[$index - 1]; ?>
                  <span><?= $razryads[$key] ?> <?= $times[$key] ?></span>
                </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php require($_SERVER['DOCUMENT_ROOT']."/components/footer.php") ?>
  <script src="/js/select.js"></script>
</body>

</html>