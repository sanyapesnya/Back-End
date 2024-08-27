<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримання ID з форми
    $id = htmlspecialchars($_POST['id']);

    // Підключення до бази даних
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', 'root');

    // SQL запит для видалення запису
    $sql = "DELETE FROM tov WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Виконання запиту
    if ($stmt->execute()) {
        echo "Запис було успішно вилучено.";
    } else {
        echo "Помилка при вилученні запису.";
    }
}
?>
<a href="index.php">Повернутися до головної сторінки</a>
