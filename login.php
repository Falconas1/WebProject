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
                ?>
            <h3 class='session_message' >Вы вошли под именем <?=$_SESSION['username']?></h3>
            <?php echo '<img src="' . '/users/' . $_SESSION['username'] . '/avatar.jpg' . '" alt="Avatar" width="150" height="150">'; ?>
            <h3 class='session_message'><a class='session_message' href="auth?logout=1">Выйти</a></h3>
        <?php }
            else {
            ?>

        <h3>Enter your login credentials</h3>
        <form name="login" method="POST" action="auth.php" enctype="multipart/form-data" autocomplete="on">
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

            <div class="wrap">
                <button type="submit">
                    Submit
                </button>
            </div>

            <div class="qon">
                Not registered? <a href="signup">Create an account</a>
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