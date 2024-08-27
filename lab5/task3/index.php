<!DOCTYPE html>
<html>
<head>
    <title>Працівники</title>
</head>
<body>
<h1>Працівники</h1>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Посада</th>
        <th>Зарплата</th>
        <th>Дії</th>
    </tr>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', 'root');
    $sql = "SELECT * FROM employees";
    foreach ($pdo->query($sql) as $row) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['position']}</td>";
        echo "<td>{$row['salary']}</td>";
        echo "<td>
                    <a href='edit_employee.php?id={$row['id']}'>Редагувати</a> |
                    <a href='delete_employee.php?id={$row['id']}'>Видалити</a>
                  </td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="add_employee.php">
    <button>Додати працівника</button>
</a>
<a href="statistics.php">
    <button>Отримати статистику</button>
</a>
</body>
</html>
