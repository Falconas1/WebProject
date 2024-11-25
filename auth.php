<?php
session_start(["use_strict_mode" => true]);
unset($_SESSION['message']);
if (isset($_POST['login'])) {
    setcookie("login", $_POST['login'], time()+60);
    if ($_POST['login'] == 'Falcona'){
        if ($_POST['password'] == 'qwerty123') {
            $_SESSION['username'] = $_POST['login'];
            header('Location: login.php');
            die;
        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный пароль!';
            header('Location: login.php');
            die;
        }
    }
    else {
        $_SESSION['message'] = 'Вы ввели неправильный логин!';
        header('Location: login.php');
        die;
    }
}
if ($_GET['logout'] == 1) {
    session_unset();
    $_SESSION['message'] = 'Вы успешно вышли из системы!';
    header('Location: login.php');
    die;
}