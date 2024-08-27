<?php
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!empty($login) && !empty($password)) {
        $folder_path = __DIR__ . '/' . $login;
        if (!file_exists($folder_path)) {
            mkdir($folder_path);

            mkdir($folder_path . '/video');
            mkdir($folder_path . '/music');
            mkdir($folder_path . '/photo');

            file_put_contents($folder_path . '/video/video1.mp4', '');
            file_put_contents($folder_path . '/music/music1.mp3', '');
            file_put_contents($folder_path . '/photo/photo1.jpg', '');

            echo 'Папка успішно створена.';
        } else {
            echo "Папка з таким ім'ям вже існує.";
        }
    } else {
        echo 'Логін та пароль не можуть бути порожніми.';
    }
}
?>
