<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../globals.css" />
        <title>Lab 3 Task 5</title>

        <style>
            body {
                font-size: <?php echo isset($_COOKIE['font_size'])
                    ? $_COOKIE['font_size']
                    : '22px'; ?>
            }
        </style>
    </head>
    <body>
        <form action="create_folder.php" method="post">
            <label for="login">Логін</label>
            <input type="text" name="login" id="login" required>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" name="submit">Створити папку</button>
        </form>
    </body>
</html>
