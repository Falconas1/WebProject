<?php
session_start(["use_strict_mode" => true]);
error_reporting(0);

$msg = "";
unset($_SESSION['message']);

if (isset($_SESSION['username'])) {
    if (isset($_POST['upload'])) {
        require('dbcon.php');

        $result = mysqli_query($db,"SELECT id FROM users WHERE login='".$_SESSION['username']."';");
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);
            $userid =  $row['id'];
        } else {
            echo "Please re-login";
        }
        $sql = "INSERT INTO `comments` (`CommentID`, `PostID`, `UserID`, `Content`, `CreatedAt`) VALUES (NULL, '".$_POST['postid']."', '".$userid."', '".$_POST['text']."', CURRENT_DATE());";
        mysqli_query($db, $sql);

        header('Location: post?id='.$_POST['postid'].'');
        die;
    }
} else {
    header('Location: post?id='.$_POST['postid'].'');
    die;
}