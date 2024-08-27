<?php
$genders = [
    'male' => 'чоловік',
    'female' => 'жінка'
];

$cities = [
    'zhytomyr' => 'Житомир',
    'kyiv' => 'Київ',
    'lviv' => 'Львів'
];

$games = [
    'soccer' => 'футбол',
    'basketball' => 'баскетбол',
    'volleyball' => 'волейбол',
    'chess' => 'шахи',
    'world_of_tanks' => 'World of Tanks'
];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../globals.css">
        <title>Info</title>
    </head>
    <body>
        <div class="info-table">
            <?php
                session_start();

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];
                    $_SESSION['gender'] = $_POST['gender'];
                    $_SESSION['city'] = $_POST['city'];
                    $_SESSION['favourite_games'] = $_POST['favourite_games'];
                    $_SESSION['about'] = $_POST['about'];

                    $favourite_games = array_map(function ($game) use ($games) {
                        return $games[$game];
                    }, $_POST['favourite_games']);
                    $is_passwords_match = $_POST['password'] === $_POST['password_repeat'];

                    echo '<table>';

                    echo '<tr>';
                    echo '<td>Логін:</td>';
                    echo "<td>{$_POST['username']}</td>";
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td>Пароль:</td>';
                    echo '<td>' . ($is_passwords_match ? $_POST['password'] : 'не співпадає (перший - ') . strlen($_POST['password']) . ' символів, другий - ' . strlen($_POST['password_repeat']) . ' символів)';
                    echo '</td></tr>';

                    echo '<tr>';
                    echo '<td>Стать:</td>';
                    echo "<td>{$genders[$_POST['gender']]}</td>";
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td>Місто:</td>';
                    echo "<td>{$cities[$_POST['city']]}</td>";
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td>Улюблені ігри:</td>';
                    echo '<td>' . implode(', ', $favourite_games) . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td>Про себе:</td>';
                    echo '<td>' . nl2br(htmlspecialchars($_POST['about'])) . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td>Фото:</td>';
                    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['photo']['name'];
                        $tmp = $_FILES['photo']['tmp_name'];
                        $destination = getenv('HOME') . '/code/httpd/uploads/' . $filename;

                        move_uploaded_file($tmp, $destination);

                        echo "<td><img src='display_image.php?filename=$filename' alt='uploaded photo'></td>";
                    } else {
                        echo '<td>Error: ' . $_FILES['photo']['error'] . '</td>';
                    }
                    echo '</tr>';

                    echo '</table>';
                }
            ?>
            </div>
        </div>
    </body>
</html>
