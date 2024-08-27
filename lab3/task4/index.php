<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../globals.css" />
        <title>Lab 3 Task 4</title>

        <style>
            body {
                font-size: <?php echo isset($_COOKIE['font_size'])
                    ? $_COOKIE['font_size']
                    : '22px'; ?>
            }
        </style>
    </head>
    <body>
        <h1>Завантажити зображення</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <button type="submit">Завантажити</button>
        </form>
    </body>
</html>
