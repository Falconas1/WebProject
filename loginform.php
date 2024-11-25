<?php
if (isset($_POST)) {
    setcookie("login", $_POST['login'], time()+120);
    echo "<br>Your name is " . $_COOKIE['login'];
    echo "<br>Your password is " . $_POST['password'];
}

