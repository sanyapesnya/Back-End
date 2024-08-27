<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab 5</title>
</head>
<body>
<h2>Реєстрація</h2>
<form action="register.php" method="post">
    <table>
        <tr>
            <td>
                <label for="email">Ел. пошта:</label>
            </td>
            <td>
                <input type="email" id="email" name="email" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Пароль:</label>
            </td>
            <td>
                <input type="password" id="password" name="password" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="name">Ім'я</label>
            </td>
            <td>
                <input type="text" name="name" id="name" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="surname">Прізвище</label>
            </td>
            <td>
                <input type="text" name="surname" id="surname" required>
            </td>
        </tr>
        <tr>
            <td>
                <label>Стать:</label>
            </td>
            <td>
                <input type="radio" name="gender" id="male" value="male" required>
                <label for="male">Чоловік</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Жінка</label>
            </td>
        </tr>
        <tr>
            <td><label for="dob">Дата народження:</label></td>
            <td><input type="date" name="dob" id="dob" required></td>
        </tr>
        <tr>
            <td><label for="occupation">Рід зайнятості:</label></td>
            <td>
                <input type="text" name="occupation" id="occupation" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="hobbies">Хоббі:</label>
            </td>
            <td>
                <input type="text" name="hobbies" id="hobbies" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="about">Про себе:</label>
            </td>
            <td>
                <textarea name="about" id="about" cols="16" rows="5" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Зареєструватися">
            </td>
        </tr>
    </table>
</form>
<p>Маєте обліковий запис? <a href="index.php">Ввійти</a></p>
</body>
</html>