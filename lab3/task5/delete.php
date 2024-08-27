<?php
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!empty($login) && !empty($password)) {
        $folder_path = __DIR__ . '/' . $login;
        if (file_exists($folder_path)) {
            $result = deleteDirectory($folder_path);
            if ($result) {
                echo 'Папка успішно видалена.';
            } else {
                echo 'Сталася помилка при видаленні папки.';
            }
        } else {
            echo "Папка з таким ім'ям не існує.";
        }
    } else {
        echo 'Логін та пароль не можуть бути порожніми.';
    }
}

function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir) || is_link($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!deleteDirectory($dir . '/' . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
?>


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
        <form action="" method="post">
            <label for="login">Логін</label>
            <input type="text" name="login" id="login" required>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" name="submit">Видалити папку</button>
        </form>
    </body>
</html>
