<?php

session_start();

if (isset($_SESSION['userid'])) {
    $pdo = new PDO("mysql:host=localhost;dbname=lab5", "root", "root");
    $statement = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $statement->bindValue(":id", $_SESSION['userid']);
    $statement->execute();
    if ($statement->rowCount()) {
        session_destroy();
        echo 'Ваш профіль успішно видалено!';
    } else {
        header('Location: index.php');
    }
}
