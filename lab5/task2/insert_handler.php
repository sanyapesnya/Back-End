<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $category = htmlspecialchars($_POST['category']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $description = htmlspecialchars($_POST['description']);

    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', 'root');

    $sql = "INSERT INTO tov (name, category, price, quantity, description) VALUES (:name, :category, :price, :quantity, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        echo "Новий запис було успішно додано.";
    } else {
        echo "Помилка при додаванні запису.";
    }
}
?>
<a href="index.php">Повернутися до головної сторінки</a>
