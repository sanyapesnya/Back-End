<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $position = htmlspecialchars($_POST['position']);
    $salary = htmlspecialchars($_POST['salary']);

    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', 'root');
    $sql = "INSERT INTO employees (name, position, salary) VALUES (:name, :position, :salary)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':salary', $salary);

    if ($stmt->execute()) {
        echo "Працівник успішно створений!";
    } else {
        echo "Помилка створення працівника!";
    }
}
?>
<a href="index.php">Повернутись на головну</a>
