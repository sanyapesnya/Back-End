<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', 'root');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $gender = htmlspecialchars($_POST['gender']);
    $dob = htmlspecialchars($_POST['dob']);
    $occupation = htmlspecialchars($_POST['occupation']);
    $hobbies = htmlspecialchars($_POST['hobbies']);
    $about = htmlspecialchars($_POST['about']);

    $statement = $pdo->prepare(
        'UPDATE users SET name = :name, surname = :surname, gender = :gender, birthdate = :dob, occupation = :occupation, hobbies = :hobbies, about = :about WHERE id = :id'
    );
    $statement->bindValue(':name', $name);
    $statement->bindValue(':surname', $surname);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':dob', $dob);
    $statement->bindValue(':occupation', $occupation);
    $statement->bindValue(':hobbies', $hobbies);
    $statement->bindValue(':about', $about);
    $statement->bindValue(':id', $_SESSION['userid']);

    if ($statement->execute()) {
        echo 'Дані успішно оновлені.';
    } else {
        echo 'Помилка при оновленні даних.';
    }
}
?>
