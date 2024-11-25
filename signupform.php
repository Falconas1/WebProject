<?php
if (isset($_POST)) {
    setcookie("username", $_POST['username'], time()+120);
    setcookie("login", $_POST['login'], time()+120);
    print("<br>Имя: " . $_POST['username']);
    print("<br>Логин: " . $_POST['login']);
    print("<br>Пароль: " . $_POST['password']);
    print("<br>Статус: " . $_POST['status']);
    print("<br>Чекбокс: " . $_POST['confirm']);
    print("<br>Регион: " . $_POST['region']);
    if (isset($_FILES['avatar'])) {
        $file = $_FILES['avatar'];
        print("<br>Загружен файл с именем " . $file['name'] . " и размером " . $file['size'] . " байт");
        $current_path = $_FILES['avatar']['tmp_name'];
        $filename = $_FILES['avatar']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $dir = dirname(__FILE__) . '/users/' . $_POST['login'];
        $permissions = 0777;
        if (!file_exists($dir)) {
            mkdir($dir, $permissions, true);
        }
        $new_filename = 'avatar.' . $extension;
        $new_path = $dir . '/' . $new_filename;
        move_uploaded_file($current_path, $new_path);
        $b_path = '/users/' . $_POST['login'] . '/' . $new_filename;
        echo '<br><img src="' . $b_path . '" alt="Avatar" width="400" height="400">';
    }
}

