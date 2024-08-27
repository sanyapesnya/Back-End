<?php
$filename = 'comments.txt';
$comments = [];

if (isset($_POST['name']) && isset($_POST['comment'])) {
    $str = $_POST['name'] . ' - ' . $_POST['comment'] . PHP_EOL;

    file_put_contents($filename, $str, FILE_APPEND);
}

if (file_exists($filename)) {
    $handle = fopen($filename, 'r');

    while (($line = fgets($handle)) !== false) {
        $name = substr($line, 0, strpos($line, '-') - 1);
        $comment = substr($line, strpos($line, '-') + 2);

        array_push($comments, ['Author' => $name, 'Comment' => $comment]);
    }

    fclose($handle);
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../globals.css" />
        <title>Lab 3 Task 3</title>

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
            <label for="name">Ім'я</label>
            <input type="text" name="name" id="name">
            <label for="login">Коментар</label>
            <input type="text" name="comment" id="comment">
            <button>Залишити коментар</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($comments)) {
                    foreach ($comments as $comment) {
                        echo "<tr><td>{$comment['Author']}</td>";
                        echo "<td>{$comment['Comment']}</td></tr>";
                    }
                } ?>
            </tbody>
        </table>
    </body>
</html>
