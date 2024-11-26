<?php
require 'dbcon.php';
$sql = 'SELECT * FROM `categories`';
$result = mysqli_query($db, $sql);
?>

<div class="new_post">
    <h2>Новый пост</h2>
    <h3>Поделитесь чем-нибудь новым</h3>

    <?php
    session_start(["use_strict_mode" => true]);
    if (isset($_SESSION['username'])) {
    ?>
    <form name="new_post" method="POST" action="send_post.php" enctype="multipart/form-data" autocomplete="off">

        <label for="select">Категория:</label>
        <div class="select">
            <select id="select" name="category">
                <?php
                while($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['CategoryID'] . '">' . $row['Name'] . '</option>';
                }
                ?>
            </select>
        </div>

        <label for="Topic">
            Заголовок:
        </label>
        <input type="text" id="topic" name="topic"
               placeholder="Введите заголовок" required>

        <label for="text">Текст:</label><br>
        <textarea id="text" name="text" cols="80" placeholder="Введите текст" required></textarea>

        <br><label>
            Добавить фотографию:
        </label>
        <input type="file" id="picture" name="uploadfile">

        <div class="wrap">
            <button type="submit" name="upload">
                Отправить
            </button>
        </div>
    </form>
    <?php } else { ?>
    <h3><a href="login" style="text-decoration: none">Войдите в аккаунт</a>, чтобы выложить новый пост</h3>
    <?php } ?>
</div>
