<?php
function echoGreeting()
{
    echo "<h1>Добрий день, {$_SESSION['username']}!</h1>";
    echo '<a href="logout.php">Вийти</a>';
}

session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echoGreeting();
    exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] === 'Admin' && $_POST['password'] == 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $_POST['login'];
        echoGreeting();
        exit();
    } else {
        echo '<p style="color: red;">Невірний логін або пароль!</p>';
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../globals.css" />
        <title>Lab 3 Task 2</title>

        <style>
            form label, button, p {
                font-size: <?php echo isset($_COOKIE['font_size'])
                    ? $_COOKIE['font_size']
                    : '22px'; ?>
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <label for="login">Логін</label>
            <input type="text" name="login" id="login">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password">
            <button>Авторизуватись</button>
        </form>
    </body>
</html>
