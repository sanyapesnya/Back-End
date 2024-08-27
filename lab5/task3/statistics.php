<!DOCTYPE html>
<html>
<head>
    <title>Статистика</title>
</head>
<body>
<h1>Статистика</h1>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', 'root');

$sql = "SELECT AVG(salary) as avg_salary FROM employees";
$stmt = $pdo->query($sql);
$avgSalary = $stmt->fetch(PDO::FETCH_ASSOC)['avg_salary'];
echo "<p>Середня заробітна плата: $" . round($avgSalary, 3) . "</p>";

$sql = "SELECT position, COUNT(*) as count FROM employees GROUP BY position";
$stmt = $pdo->query($sql);
echo "<h2>Кількість працівників на кожній посаді:</h2>";
echo "<ul>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>{$row['position']}: {$row['count']}</li>";
}
echo "</ul>";
?>
<a href="index.php">Повернутись на головну</a>
</body>
</html>
