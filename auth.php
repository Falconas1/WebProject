<?php
global $conn;
session_start(["use_strict_mode" => true]);
require('dbconnect.php');
unset($_SESSION['message']);
if (isset($_POST['login'])) {
    setcookie("login", $_POST['login'], time()+60);
    $result = $conn->query("SELECT * FROM users WHERE login = '".$_POST['login']."'");
    if ($row = $result->fetch()) {
        if (MD5($_POST["password"]) == $row['password']) {
            $_SESSION['username'] = $_POST['login'];
        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный пароль!';
//            $_SESSION['message'] = MD5($_POST["password"]);
        }
    }
    else {
        $_SESSION['message'] = 'Вы ввели неправильный логин!';
    }
    header('Location: login.php');
    die;
}
if ($_GET['logout'] == 1) {
    session_unset();
    $_SESSION['message'] = 'Вы успешно вышли из системы!';
    header('Location: login.php');
    die;
}