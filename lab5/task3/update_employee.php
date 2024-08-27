<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $position = htmlspecialchars($_POST['position']);
    $salary = htmlspecialchars($_POST['salary']);

    $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', 'root');
    $sql = "UPDATE employees SET name = :name, position = :position, salary = :salary WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':salary', $salary);

    if ($stmt->execute()) {
        echo "Employee updated successfully.";
    } else {
        echo "Error updating employee.";
    }
}
?>
<a href="index.php">Back to Employees</a>
