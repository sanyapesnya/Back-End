<!DOCTYPE html>
<html>
<head>
    <title>Створити працівника</title>
</head>
<body>
<h1>Створити працівника</h1>
<form action="insert_employee.php" method="post">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" id="name" required><br>
    <label for="position">Посада:</label>
    <input type="text" name="position" id="position" required><br>
    <label for="salary">Зарплата:</label>
    <input type="number" step="0.01" name="salary" id="salary" required><br>
    <button type="submit">Створити працівника</button>
</form>
</body>
</html>
