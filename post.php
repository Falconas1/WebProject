<?php
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebProject</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/post.css">
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
        <div class="main">

            <?php
            global $postid;
            $postid = $_GET['id'];
            $sql = 'SELECT * FROM `posts` WHERE PostID='.$_GET['id'].';';
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $user = mysqli_query($db,"SELECT login FROM users WHERE id='".$row['UserID']."';");
                if(mysqli_num_rows($user) > 0 ){
                    $userrow = mysqli_fetch_assoc($user);
                    $login =  $userrow['login'];
                }
                $cat = mysqli_query($db,"SELECT Name FROM categories WHERE CategoryID='".$row['CategoryID']."';");
                if(mysqli_num_rows($cat) > 0 ){
                    $catrow = mysqli_fetch_assoc($cat);
                    $category =  $catrow['Name'];
                }

                ?><div class="post"><?php
                echo '<div class="title"><h2>'.$login.' в категории: '.$category.'</h2></div>';
                echo '<h3>'.$row['Title'].'</h3>';
                echo '<p>'.$row['Content'].'</p>';
                $pic = mysqli_query($db,"SELECT FileName FROM image WHERE ImageID='".$row['ImageID']."';");
                if(mysqli_num_rows($pic) > 0 ){
                    $picrow = mysqli_fetch_assoc($pic);
                    $picture =  $picrow['FileName'];
                    ?><div class="postimg"><?php
                    echo '<img src="/'.$picture.'" alt="'.$row['ImageID'].'">';
                    ?></div><?php
                }
                ?></div><?php
            }
            ?>

            <h2 style="font-size: 25px">Комментарии:</h2>

            <?php
            $sql = 'SELECT * FROM `comments` WHERE PostID='.$_GET['id'].';';
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $user = mysqli_query($db,"SELECT login FROM users WHERE id='".$row['UserID']."';");
                if(mysqli_num_rows($user) > 0 ){
                    $userrow = mysqli_fetch_assoc($user);
                    $login =  $userrow['login'];
                }
                $picid = mysqli_query($db,"SELECT Avatar FROM users WHERE id='".$row['UserID']."';");
                if(mysqli_num_rows($picid) > 0 ){
                    $picrow = mysqli_fetch_assoc($picid);
                    $imageid =  $picrow['Avatar'];
                }
                $fname = mysqli_query($db,"SELECT FileName FROM image WHERE ImageID='".$imageid."';");
                if(mysqli_num_rows($fname) > 0 ){
                    $imagerow = mysqli_fetch_assoc($fname);
                    $filename =  $imagerow['FileName'];
                }
                ?><div class="comments"><?php
                echo '<div class="fline"><img src="/'.$filename.'" alt=""><h2>'.$login.'</h2></div>';
                echo '<h3>'.$row['Content'].'</h3>';
                ?></div><?php
            }
            ?>

            <?php
            session_start(["use_strict_mode" => true]);
            if (isset($_SESSION['username'])) {
            ?>
            <div class="newcom">
                <h2>Оставьте свой комментарий:</h2>

                <form name="new_com" method="post" action="new_com.php">
                    <textarea id="text" name="text" cols="80" rows="3" placeholder="Введите текст" required></textarea>
                    <input type='hidden' name='postid' value='<?php echo "$postid";?>'/>

                    <div class="wrap">
                        <button type="submit" name="upload">
                            Отправить
                        </button>
                    </div>
                </form>

            </div>
            <?php } else { ?>
            <div class="newcom">
                <h2><a href="login" style="text-decoration: none">Войдите в аккаунт</a>, чтобы оставить комментарий</h2>
            </div>
            <?php }?>
        </div>
    </div>
    <?php include("footer.php") ?>
</div>
</body>
</html>