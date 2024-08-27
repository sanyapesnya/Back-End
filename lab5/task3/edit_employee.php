<!DOCTYPE html>
<html>
<head>
    <title>Редагування працівника</title>
</head>
<body>
<h1>Редагування працівника</h1>
<?php
$id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', 'root');
$sql = "SELECT * FROM employees WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$employee = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form action="update_employee.php" method="post">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" id="name" value="<?php echo $employee['name']; ?>" required><br>
    <label for="position">Посада:</label>
    <input type="text" name="position" id="position" value="<?php echo $employee['position']; ?>" required><br>
    <label for="salary">Зарплата:</label>
    <input type="number" step="0.01" name="salary" id="salary" value="<?php echo $employee['salary']; ?>" required><br>
    <button type="submit">Обновити працівника</button>
</form>
</body>
</html>
