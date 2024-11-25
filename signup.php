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
  <nav>
    <div class="main-nav"><ul class="navi">
      <li id="name" class="nav-item">
        <a href="index" class="nav-link">Toster</a>
      </li>
      <li id="fr" class="nav-item">
        <a href="login" class="nav-link">Profile</a>
      </li>
    </ul></div>
  </nav>
  <div id="signup" class="page">
    <h1>Toster</h1>
    <h3>Enter your login credentials</h3>
    <form name="signup" method="POST" action="signupform.php" enctype="multipart/form-data" autocomplete="on">
      <label for="username">
        Username:
      </label>
      <input type="text" id="username" name="username"
             placeholder="Enter your Username" required value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">

      <label for="login">
        Login:
      </label>
      <input type="text" id="login" name="login"
             placeholder="Enter your Login" required value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : ''; ?>">

      <label for="password">
        Password:
      </label>
      <input type="password" id="password" name="password"
             placeholder="Enter your Password" required>

      <label>
        Your status:
      </label>
      <div class="radio">
        <input type="radio" name="status" value="student" checked>Студент<br>
        <input type="radio" name="status" value="pupil">Школьник<br>
        <input type="radio" name="status" value="worker">Работник<br>
        <input type="radio" name="status" value="pensioner">Пенсионер<br>
      </div>

      <label>
        Your region:
      </label>
      <div class="select">
        <select id="select" name="region">
          <option value="0">Москва</option>
          <option value="1">Югра</option>
          <option value="2">Тюменская обл.</option>
          <option value="3">Другое</option>
        </select>
      </div>

      <label>
        Your profile picture:
      </label>
      <input type="file" id="avatar" name="avatar">

      <div class="wrap">
        <button type="submit">
          Submit
        </button>
      </div>

      <label class="checkbox">
        Я согласен с <a href="">правилами регистрации</a>: <input type="checkbox" name="confirm" required>
      </label>
      <div class="al_acc">
          Уже зарегистрированы? <a href="login">Войдите</a>
      </div>

    </form>
  </div>
  <footer>
    <div class="foot">
      <a href="">+7 (9000) 000 - 000</a>
    </div>
  </footer>
</div>
</body>
</html>