<?php
if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_destination = 'uploads/' . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
        echo '<h1>Файл успішно завантажено!</h1>';
    } else {
        echo '<h1 style="color: red;">Помилка завантаження файлу!';
    }
} else {
    echo '<h1 style="color: red;">Файл не було відправлено!</h1>';
}
?>
