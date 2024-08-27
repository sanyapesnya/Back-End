<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab 2 Task 3</title>
        <link rel="stylesheet" href="../../globals.css">
    </head>
    <body>
        <header>
            <div class="lang-bar">
                <a href="index.php?lang=ua"><img src="./static/ua.png" alt="ua"></a>
                <a href="index.php?lang=ru"><img src="./static/ru.png" alt="ru"></a>
                <a href="index.php?lang=pl"><img src="./static/pl.png" alt="pl"></a>
                <a href="index.php?lang=en"><img src="./static/en.png" alt="en"></a>
                <a href="index.php?lang=de"><img src="./static/de.png" alt="de"></a>
                <a href="index.php?lang=fr"><img src="./static/fr.png" alt="fr"></a>
            </div>
        </header>

        <?php
            session_start();

            $languages = [
                'ua' => 'Українська',
                'ru' => 'Російська',
                'pl' => 'Польська',
                'en' => 'Англійська',
                'de' => 'Німецька',
                'fr' => 'Французька'
            ];

            $half_year = 6 * 30 * 24 * 60 * 60;

            if (isset($_GET['lang'])) {
                $lang = $_GET['lang'];
                setcookie('lang', $lang, time() + $half_year, '/');
            } elseif (isset($_COOKIE['lang'])) {
                $lang = $_COOKIE['lang'];
            } else {
                $lang = 'ua';
            }

            echo "<h1>Вибрана мова: {$languages[$lang]}</h1>";

            $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
            $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
            $city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
            $favourite_games = isset($_SESSION['favourite_games']) ? $_SESSION['favourite_games'] : array();
            $about = isset($_SESSION['about']) ? $_SESSION['about'] : '';
        ?>

        <form action="info.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="username">Логін:</label>
                <input type="text" id="username" name="username" value=<?php echo htmlspecialchars($username) ?> required>
            </div>
            <div>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" value=<?php echo htmlspecialchars($username) ?> required>
            </div>
            <div>
                <label for="password_repeat">Пароль (ще раз):</label>
                <input type="password" id="password_repeat" name="password_repeat" value=<?php echo htmlspecialchars($username) ?> required>
            </div>
            <div>
                <label>Стать:</label>
                <div>
                    <label>
                        <input type="radio" name="gender" value="male" <?php echo ($gender === 'male') ? 'checked' : '' ?> required>
                            чоловік
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female" <?php echo ($gender === 'female') ? 'checked' : '' ?>>
                            жінка
                    </label>
                </div>
            </div>
            <div>
                <label for="city">Місто:</label>
                <select name="city" id="city">
                    <option value="zhytomyr" <?php echo ($city === 'zhytomyr') ? 'selected' : '' ?>>Житомир</option>
                    <option value="kyiv" <?php echo ($city === 'kyiv') ? 'selected' : '' ?>>Київ</option>
                    <option value="lviv" <?php echo ($city === 'lviv') ? 'selected' : '' ?>>Львів</option>
                </select>
            </div>
            <div>
                <div>
                    <label for="favourite_games">Улюблені ігри:</label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="favourite_games[]" value="soccer" <?php echo (in_array('soccer', $favourite_games)) ? 'checked' : '' ?>>
                            футбол
                    </label><br/>
                    <label>
                        <input type="checkbox" name="favourite_games[]" value="basketball" <?php echo (in_array('basketball', $favourite_games)) ? 'checked' : '' ?>>
                            баскетбол
                    </label><br/>
                    <label>
                        <input type="checkbox" name="favourite_games[]" value="volleyball" <?php echo (in_array('volleyball', $favourite_games)) ? 'checked' : '' ?>>
                            волейбол
                    </label><br/>
                    <label>
                        <input type="checkbox" name="favourite_games[]" value="chess" <?php echo (in_array('chess', $favourite_games)) ? 'checked' : '' ?>>
                            шахи
                    </label><br/>
                    <label>
                        <input type="checkbox" name="favourite_games[]" value="world_of_tanks" <?php echo (in_array('world_of_tanks', $favourite_games)) ? 'checked' : '' ?>>
                            World of Tanks
                    </label>
                </div>
            </div>
            <label for="about">Про себе:</label>
            <textarea name="about" id="about" cols="6" rows="6"><?php echo htmlspecialchars($about) ?></textarea>
            <label for="image">Фотографія:</label>
            <input type="file" name="photo" id="photo" accept="image/*">
            <button type="submit">Зареєструватися</button>
        </form>
    </body>
</html>
