<?php

session_start();

isset($_COOKIE['font_size'])
    ? ($fontSize = $_COOKIE['font_size'])
    : ($fontSize = '24px');

if (isset($_GET['fontSize'])) {
    switch ($_GET['fontSize']) {
        case 'lg':
            $fontSize = '32px';
            break;
        case 'sm':
            $fontSize = '16px';
            break;
        default:
            $fontSize = '22px';
            break;
    }

    setcookie('font_size', $fontSize, time() + (7 * 24 + 60 * 60), '/');
    header("Location: {$_SERVER['PHP_SELF']}");
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <met name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../globals.css" />
        <title>Lab 3 Task 1</title>

        <style>
            body {
                font-size: <?php echo isset($_COOKIE['font_size'])
                    ? $_COOKIE['font_size']
                    : '22px'; ?>
            }
        </style>
    </head>
    <body>
        <a href="?fontSize=lg">Великий шрифт</a>
        <a href="?fontSize=md">Середній шрифт</a>
        <a href="?fontSize=sm">Маленький шрифт</a>
    </body>
</html>
