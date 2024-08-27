<?php
session_start();

function displayUserData()
{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=lab5;charset=utf8',
        'root',
        'root'
    );

    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindValue(':id', $_SESSION['userid']);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "<h1>Вітаємо, {$user['name']}!</h1>";
        echo '<form action="update.php" method="post"><table>';
        echo '<tr>
            <td><label for="name">Ім\'я:</label></td>
            <td><input type="text" name="name" id="name" value="' .
            htmlspecialchars($user['name']) .
            '" required></td>
        </tr>';
        echo '<tr>
            <td><label for="surname">Прізвище:</label></td>
            <td><input type="text" name="surname" id="surname" value="' .
            htmlspecialchars($user['surname']) .
            '" required></td>
        </tr>';
        echo '<tr>
            <td><label>Стать:</label></td>
            <td>
                <input type="radio" name="gender" id="male" value="male" ' .
            ($user['gender'] == 'male' ? 'checked' : '') .
            ' required>
                <label for="male">Чоловік</label>
                <input type="radio" name="gender" id="female" value="female" ' .
            ($user['gender'] == 'female' ? 'checked' : '') .
            '>
                <label for="female">Жінка</label>
            </td>
        </tr>';
        echo '<tr>
            <td><label for="dob">Дата народження:</label></td>
            <td><input type="date" name="dob" id="dob" value="' .
            htmlspecialchars($user['birthdate']) .
            '" required></td>
        </tr>';
        echo '<tr>
            <td><label for="occupation">Рід зайнятості:</label></td>
            <td><input type="text" name="occupation" id="occupation" value="' .
            htmlspecialchars($user['occupation']) .
            '" required></td>
        </tr>';
        echo '<tr>
            <td><label for="hobbies">Хоббі:</label></td>
            <td><input type="text" name="hobbies" id="hobbies" value="' .
            htmlspecialchars($user['hobbies']) .
            '" required></td>
        </tr>';
        echo '<tr>
            <td><label for="about">Про себе:</label></td>
            <td><textarea name="about" id="about" cols="16" rows="5" required>' .
            htmlspecialchars($user['about']) .
            '</textarea></td>
        </tr>';
        echo '<tr>
            <td colspan="2"><button type="submit">Зберегти</button></td>
        </tr>';
        echo '</table></form>';
        echo '<form action="delete.php" method="post"><button type="submit">Видалити профіль</button></form>';
    } else {
        echo 'Користувача не знайдено.';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab 5</title>
    <link rel="stylesheet" href="../../globals.css">
</head>
<body>
<?php if (isset($_SESSION['authorized']) && $_SESSION['authorized']) {
    displayUserData();
} else {
    echo '<h2>Вхід</h2><form action="login.php" method="post">
    <label for="email">Ел.пошта:</label>
    <input type="text" id="email" name="email" required><br><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Увійти">
</form>
<p>Ще не маєте облікового запису? <a href="registration.php">Зареєструватися</a></p>';
} ?>
</body>
</html>
