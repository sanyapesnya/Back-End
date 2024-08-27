<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["email"]) || !isset($_POST["password"])) {
        http_response_code(400);
        exit();
    }

    $pdo = new PDO("mysql:host=localhost;dbname=lab5", "root", "root");
    $user = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $user->bindParam(":email", $_POST["email"]);
    $user->execute();
    $user = $user->fetch(PDO::FETCH_ASSOC);
    if (empty($user)) {
        echo 'Користувача з данною ел.поштою не знайдено!';
        exit();
    }

    if ($user["password"] != $_POST["password"]) {
        echo 'Невірні дані!';
    } else {
        $_SESSION['userid'] = $user["id"];
        $_SESSION['name'] = $user["name"];
        $_SESSION['authorized'] = true;
        header('Location: index.php');
    }
}