<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebProject</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include("nav.php") ?>
        <div class="page">
            <?php if ($_GET['page'] == '') {
                include "main.php";
            } else {
                switch ($_GET['page']) {
                    case 'newpost':
                        include "newpost.php";
                        break;
                    case 'test':
                        include "test.php";
                        break;
                }
            }
            ?>
        </div>
        <?php include("footer.php") ?>
    </div>
</body>
</html>