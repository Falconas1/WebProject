<?php
if (isset($_POST)) {
    require('dbcon.php');
    unset($_SESSION['message']);
    setcookie("email", $_POST['email'], time()+60);
    setcookie("login", $_POST['login'], time()+60);
    print("<br>Mail: " . $_POST['email']);
    print("<br>Логин: " . $_POST['login']);
    print("<br>Пароль: " . $_POST['password']);

    //Проверка на наличие с такими же данными
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='" . $_POST['login'] . "';");
    if (mysqli_num_rows($result) > 0) {
        header('Location: signup');
        die;
    }

    $result = mysqli_query($db, "SELECT * FROM users WHERE email='" . $_POST['email'] . "';");
    if (mysqli_num_rows($result) > 0) {
        header('Location: signup');
        die;
    }

    if ($_FILES['avatar']["name"]!='') {

        $filename = $_FILES["avatar"]["name"];
        $tempname = $_FILES["avatar"]["tmp_name"];
        $dir = dirname(__FILE__) . '/users/' . $_POST['login'];
        $permissions = 0777;

        if (!file_exists($dir)) {
            mkdir($dir, $permissions, true);
        }

        $folder = $dir . '/' . $filename;
        $sqldir = 'users/' . $_POST['login'] . '/' . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            $sql = "INSERT INTO image (filename) VALUES ('$sqldir')";
            mysqli_query($db, $sql);
            $imageid = mysqli_insert_id($db);
        }
    } else {
            $imageid = '2';
    }

    $sql = "INSERT INTO `users` (`id`, `login`, `email`, `password`, `Avatar`) VALUES (NULL, '".$_POST['login']."', '".$_POST['email']."', '".MD5($_POST["password"])."', '".$imageid."');";
    mysqli_query($db, $sql);

    $_SESSION['message'] = 'Вы успешно зарегистрировались!';
    header('Location: login');
    die;

}



