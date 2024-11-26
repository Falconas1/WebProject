<?php
if (isset($_POST)) {
    echo "<br>Your post title " . $_POST['topic'];
    echo "<br>Your post text is " . $_POST['text'];
    if (isset($_FILES['picture'])) {
        if (isset($_POST['picture'])) {
            echo 'Picture send';
        }
        $file = $_FILES['picture'];
        print("<br>Загружен файл с именем " . $file['name'] . " и размером " . $file['size'] . " байт");
    }
}

