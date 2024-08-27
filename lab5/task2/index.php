<!DOCTYPE html>
<html>
<head>
    <title>Управління товарами</title>
</head>
<body>
<h1>Управління товарами</h1>

<a href="insert.php">
    <button>Додати запис</button>
</a>

<form action="tov_delete.php" method="post">
    <input type="number" name="id" placeholder="Введіть ID для видалення" required>
    <button type="submit">Вилучити запис</button>
</form>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', 'root');

$sql = "SELECT * FROM tov";
$result = $pdo->query($sql);

echo "<table border='1' cellpadding='10'>";
echo "<tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Категорія</th>
            <th>Ціна</th>
            <th>Кількість</th>
            <th>Опис</th>
          </tr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>
