<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebProject</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
    </style>
</head>
<body>
<div class="wrapper">
    <nav>
        <div class="main-nav"><ul class="navi">
            <li id="name" class="nav-item">
                <a href="index.php" class="nav-link">Toster</a>
            </li>
            <li id="fr" class="nav-item">
                <a href="login.php" class="nav-link">Profile</a>
            </li>
        </ul></div>
    </nav>
    <div class="page">
        <h1>Toster</h1>
        <h3>Enter your login credentials</h3>
        <form name="login" method="POST" action="loginform.php" enctype="multipart/form-data" autocomplete="on">
            <label for="login">
                Login:
            </label>
            <input type="text" id="login" name="login"
                   placeholder="Enter your Login" required value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : ''; ?>">

            <label for="password">
                Password:
            </label>
            <input type="password" id="password" name="password"
                   placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>

        <p>Not registered?
            <a href="signup.php">
                Create an account
            </a>
        </p>
    </div>
    <footer>
        <div class="foot">
            <a href="">+7 (9000) 000 - 000</a>
        </div>
    </footer>
</div>
</body>
</html>