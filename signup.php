<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WebProject</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/login.css">
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
  </style>
</head>
<body>
<div class="wrapper">
  <?php include("nav.php") ?>
  <div id="signup" class="page">
    <h1>Toster</h1>
    <h3>Введите данные для регистрации</h3>
    <form name="signup" method="POST" action="signupform.php" enctype="multipart/form-data" autocomplete="on">
      <label for="email">
        Почта:
      </label>
      <input type="text" id="email" name="email"
             placeholder="Введите почту" required value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">

      <label for="login">
        Логин:
      </label>
      <input type="text" id="login" name="login"
             placeholder="Введите логин" required value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : ''; ?>">

      <label for="password">
        Пароль:
      </label>
      <input type="password" id="password" name="password"
             placeholder="Введите пароль" required>

      <label>
        Добавьте фотографию профиля:
      </label>
      <input type="file" id="avatar" name="avatar">

      <div class="wrap">
        <button type="submit">
          Отправить
        </button>
      </div>

      <label class="checkbox">
        Я согласен с <a href="">правилами регистрации</a>: <input type="checkbox" name="confirm" required>
      </label>
      <div class="al_acc">
          Уже зарегистрированы? <a href="login">Войдите</a>
      </div>
    </form>
      <?php
      echo ("<p class='session_message'>".$_SESSION['message']."</p>");
      unset($_SESSION['message']);
      ?>
  </div>
    <?php include("footer.php") ?>
</div>
</body>
</html>