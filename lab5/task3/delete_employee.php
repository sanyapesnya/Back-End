<?php
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', 'root');
    $sql = "DELETE FROM employees WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Працівник успішно видалений!";
    } else {
        echo "Помилка видалення!";
    }
}
?>
<a href="index.php">Повернутись на головну</a>
