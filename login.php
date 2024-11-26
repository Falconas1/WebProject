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
    <div class="page">
        <h1>Toster</h1>
        <?php
            session_start(["use_strict_mode" => true]);
            if (isset($_SESSION['username'])) {
                require('dbcon.php');
                ?>
            <h3 class='session_message' >Вы вошли под именем <?=$_SESSION['username']?></h3>
            <?php
                $userid = mysqli_query($db,"SELECT Avatar FROM users WHERE login='".$_SESSION['username']."';");
                if(mysqli_num_rows($userid) > 0 ){
                    $userrow = mysqli_fetch_assoc($userid);
                    $picid =  $userrow['Avatar'];
                }
                $picture = mysqli_query($db,"SELECT FileName FROM image WHERE ImageID='".$picid."';");
                if(mysqli_num_rows($picture) > 0 ){
                    $userrow = mysqli_fetch_assoc($picture);
                    $filename =  $userrow['FileName'];
                }
                echo '<img src="/'.$filename.'" alt="Avatar" width="150" height="150">';
            ?>
            <h3 class='session_message'><a class='session_message' href="auth?logout=1">Выйти</a></h3>
        <?php }
            else {
            ?>

        <h3>Введите данные для входа</h3>
        <form name="login" method="POST" action="auth.php" enctype="multipart/form-data" autocomplete="on">
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

            <div class="wrap">
                <button type="submit">
                    Отправить
                </button>
            </div>

            <div class="qon">
                Еще не зарегистрированы? <a href="signup">Создайте аккаунт</a>
            </div>
        </form>
        <?php }
        echo ("<p class='session_message'>".$_SESSION['message']."</p>");
        unset($_SESSION['message']);
        ?>
    </div>
    <?php include("footer.php") ?>
</div>
</body>
</html>