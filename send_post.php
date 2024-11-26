<?php
//if (isset($_POST)) {
//    echo "<br>Your post title " . $_POST['topic'];
//    echo "<br>Your post text is " . $_POST['text'];
//    if (isset($_FILES['picture'])) {
//        if (isset($_POST['picture'])) {
//            echo 'Picture send';
//        }
//        $file = $_FILES['picture'];
//        print("<br>Загружен файл с именем " . $file['name'] . " и размером " . $file['size'] . " байт");
//    }
//}
//?>

<?php
session_start(["use_strict_mode" => true]);
error_reporting(0);

$msg = "";
unset($_SESSION['message']);

if (isset($_SESSION['username'])) {
    if (isset($_POST['upload'])) {
        require('dbcon.php');

        if ($_FILES['uploadfile']["name"]!='') {
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $dir = dirname(__FILE__) . '/image/' . $_SESSION['username'];
            $permissions = 0777;

            if (!file_exists($dir)) {
                mkdir($dir, $permissions, true);
            }

            $folder = $dir . '/' . $filename;
            $sqldir = 'image/' . $_SESSION['username'] . '/' . $filename;

            if (move_uploaded_file($tempname, $folder)) {
                $sql = "INSERT INTO image (filename) VALUES ('$sqldir')";
                mysqli_query($db, $sql);
                $imageid = mysqli_insert_id($db);
                echo "<h3>&nbsp; Image uploaded successfully!</h3>";
            } else {
                echo "<h3>&nbsp; Failed to upload image!</h3>";
            }
        } else {
            $imageid = 'NULL';
            echo "imageid null";
        }

        $result = mysqli_query($db,"SELECT id FROM users WHERE login='".$_SESSION['username']."';");
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);
            $userid =  $row['id'];
        } else {
            echo "Please re-login";
        }
        $sql = "INSERT INTO `posts` (`PostID`, `CategoryID`, `UserID`, `ImageID`, `Title`, `Content`, `CreatedAt`) VALUES (NULL, '".$_POST['category']."', '".$userid."', ".$imageid.", '". $_POST['topic'] ."', '". $_POST['text'] ."', CURRENT_DATE());";
        mysqli_query($db, $sql);

//        echo "<h3>Added post!</h3>";
        header('Location: index?page=newpost');
        die;
    }
} else {
//    echo "<h3>Firstly login in!</h3>";
    header('Location: index?page=newpost');
    die;
}
?>

