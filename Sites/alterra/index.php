<?php
require_once "connect.php";
$contacts = $pdo->query("SELECT * FROM contact ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контакты</title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <form action="add_contact.php" method="post" class="contact_form card">
    <div class="contact_form_header card_header">
      <h2 class="contact_form-title title">Добавить контакт</h2>
    </div>
    <div class="contact_form_body card_body">
      <input type="text" name="username" pattern="[A-Za-zА-Яа-яЁё ]{2,}" required placeholder="Имя">
      <input type="tel" name="phone" class="phone" required placeholder="Телефон">
      <button type="submit">Добавить</button>
    </div>
  </form>
  <?php if ($contacts->rowCount() > 0): ?>
  <div class="contact_list card">
    <div class="contact_list_header card_header">
      <h2 class="contact_list-title title">Список контактов</h2>
    </div>
    <div class="contact_list_body card_body">
      <div class="contact__items">
        <?php foreach($contacts as $contact): ?>
        <div class="contact__item">
          <div class="contact__item_wrapper">
            <h3 class="contact__item-title">
              <?= $contact['username'] ?>
              <form action="delete_contact.php" method="post">
                <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                <input type="submit" value="&times;" class="contact_delete">
              </form>
            </h3>
            <h4 class="contact__item-phone"><?= $contact['phone'] ?></h4>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

</body>
<script src="./js/jquery.js"></script>
<script src="./js/mask.js"></script>
<script src="./js/index.js"></script>

</html>