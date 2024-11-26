<?php
require 'dbcon.php';
$sql = 'SELECT * FROM `posts` ORDER BY PostID DESC';
$result = mysqli_query($db, $sql);
?>
<div class="main">
    <h1>Узнайте что-нибудь новое!</h1>
    <?php
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
        $com = mysqli_query($db,"SELECT * FROM comments WHERE PostID='".$row['PostID']."';");
        $com_num = mysqli_num_rows($com);
        if($com_num > 0 ){
            echo '<div class="title"><h2>'.$login.' в категории: '.$category.'</h2><div class="comment"><div class="comin"><a href="post?id='.$row['PostID'].'"><p>'.$com_num.'</p><img src="/image/ico/com.png" alt=""></a></div></div></div>';
        } else {
            echo '<div class="title"><h2>'.$login.' в категории: '.$category.'</h2><div class="comment"><div class="comin"><a href="post?id='.$row['PostID'].'"><img src="/image/ico/com.png" alt=""></a></div></div></div>';
        }
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
</div>