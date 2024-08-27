<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../globals.css">
        <title>Lab 2</title>
    </head>
    <body>
        <h1>Лабораторна робота №2</h1>
        <h1>Сидоренко Роберт, ІПЗк-23-1</h1>

        <h2>Завдання 1.1</h2>
        <form action="" method="post">
            <label for="text">Текст:</label>
            <input type="text" id="text" name="text" required>

            <label for="find">Знайти:</label>
            <input type="text" id="find" name="find" required>

            <label for="replace">Замінити:</label>
            <input type="text" id="replace" name="replace" required>

            <input type="submit" value="Замінити">
        </form>

        <?php
            if (isset($_POST['text']) && isset($_POST['find']) && isset($_POST['replace'])) {
                $text = $_POST['text'];
                $find = $_POST['find'];
                $replace = $_POST['replace'];

                $result = str_replace($find, $replace, $text);
                echo "<h2>Результат: $result</h2>";
            }
        ?>

        <h2>Завдання 1.2</h2>
        <form action="" method="post">
            <label for="cities">Міста:</label>
            <input type="text" id="cities" name="cities" required>
            <button type="submit">Відсортувати</button>
        </form>

        <?php
            if (isset($_POST['cities'])) {
                $citiesArray = explode(' ', $_POST['cities']);
                sort($citiesArray);
                $sortedCitiesString = implode(', ', $citiesArray);
                echo "<h2>Відсортовані міста: $sortedCitiesString</h2>";
            }
        ?>

        <h2>Завдання 1.3</h2>
        <form action="" method="post">
            <label for="file_name">Ім'я файлу:</label>
            <input type="text" id="file_name" name="file_name" required>
            <button type="submit">Видалити ім'я файлу</button>
        </form>

        <?php
            if (isset($_POST['file_name'])) {
                $fileName = $_POST['file_name'];
                $split = explode('.', $fileName, 2);

                if (strrpos($split[0], '\\')) {
                    $lastSlash = strrpos($split[0], '\\');
                } else if (strrpos($split[0], '/')) {
                    $lastSlash = strrpos($split[0], '/');
                } else {
                    echo '<h2>Результат: .' . $split[1] . '</h2>';
                    return;
                }

                $splitWithoutFileName = substr($split[0], 0, $lastSlash + 1);
                echo '<h2>Результат: ' . $splitWithoutFileName . '.' . $split[1] . '</h2>';
            }
        ?>

        <h2>Завдання 1.4</h2>
        <form action="" method="post">
            <label for="date_1">Дата 1:</label>
            <input type="text" id="date_1" name="date_1" required>

            <label for="date_2">Дата 2:</label>
            <input type="text" id="date_2" name="date_2" required>

            <button type="submit">Отримати різницю днів</button>
        </form>

        <?php
            if (isset($_POST['date_1']) && isset($_POST['date_2'])) {
                $date1 = new DateTime($_POST['date_1']);
                $date2 = new DateTime($_POST['date_2']);
                $diff = $date1->diff($date2);
                echo '<h2>Результат: ' . $diff->days . ' днів</h2>';
            }
        ?>

        <h2>Завдання 1.5</h2>
        <form action="" method="post">
            <label for="password_length">Довжина паролю:</label>
            <input type="number" id="password_length" name="password_length" required>
            <button type="submit">Згенерувати пароль</button>
        </form>

        <?php
            if (isset($_POST['password_length'])) {
                $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!"#$%&\'()*+,-./:;<=>?@[\]^_`{|}~';
                $password = '';
                for ($i = 0; $i < $_POST['password_length']; $i++) {
                    $password .= $dict[rand(0, strlen($dict) - 1)];
                }
                echo '<h2>Результат: ' . $password . '</h2>';
            }
        ?>

        <form action="" method="post">
            <label for="password">Пароль:</label>
            <input type="text" id="password" name="password" required>
            <button type="submit">Перевірити пароль на міцність</button>
        </form>

        <?php
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $strength = 0;

                if (strlen($password) < 8) {
                    echo '<h2>Результат: Пароль занадто короткий</h2>';
                    return;
                } else {
                    $strength += 1;
                }

                if (preg_match('/[a-z]/', $password)) {
                    $strength += 1;
                }

                if (preg_match('/[A-Z]/', $password)) {
                    $strength += 1;
                }

                if (preg_match('/[0-9]/', $password)) {
                    $strength += 1;
                }

                if (preg_match('/[!@#$%^&*()_+{}|:<>?~]/', $password)) {
                    $strength += 1;
                }
                $result = $strength < 5 ? 'Пароль слабкий' : 'Пароль міцний';
                echo '<h2>' . $result . '</h2>';
            }
        ?>

        <h2>Завдання 2.1</h2>
        <form action="" method="post">
            <label for="array_string">Дані масиву (розділяти через пробіл):</label>
            <input type="text" id="array_string" name="array_string" required>
            <button type="submit">Перевірити на повторення значень в масиві</button>
        </form>

        <?php
            if (isset($_POST['array_string'])) {
                $array = explode(' ', $_POST['array_string']);
                $notUniqueItems = [];

                for ($i = 0; $i < count($array); $i++) {
                    if (in_array($array[$i], $notUniqueItems))
                        continue;
                    for ($j = $i + 1; $j < count($array); $j++) {
                        if ($array[$i] == $array[$j]) {
                            array_push($notUniqueItems, $array[$i]);
                            break;
                        }
                    }
                }

                if (!count($notUniqueItems)) {
                    echo '<h2>Масив не має повторень</h2>';
                    return;
                }

                $result = implode(',', $notUniqueItems);
                echo '<h2>Повторення: ' . $result . '</h2>';
            }
        ?>

        <h2>Завдання 2.2</h2>
        <form action="" method="post">
            <button type="submit" name="generate_name">Згенерувати ім'я</button>
        </form>

        <?php

            /**
             * @param array<array<string>, array<string>> $components
             * @return string
             */
            function generateAnimalName(&$components)
            {
                $name = '';
                $num_components = count($components);

                for ($i = 0; $i < $num_components; $i++) {
                    $rand_index = array_rand($components[$i]);
                    $name .= $components[$i][$rand_index];
                }

                return $name;
            }

            if (isset($_POST['generate_name'])) {
                $cat_components = array(
                    array('Мур', 'Мяу', 'Ласк'),
                    array('ик', 'о', 'ун', 'а')
                );

                $dog_components = array(
                    array('Гав', 'Вуф', 'Лай'),
                    array('ик', 'о', 'ус', 'ун')
                );

                $hamster_components = array(
                    array('Чіп', 'Пір', 'Сміш'),
                    array('ик', 'о', 'ко', 'ун')
                );

                echo '<h2>Кішка: ' . generateAnimalName($cat_components) . '</h2>';
                echo '<h2>Собака: ' . generateAnimalName($dog_components) . '</h2>';
                echo "<h2>Хом'як: " . generateAnimalName($hamster_components) . '</h2>';
            }
        ?>

        <h2>Завдання 2.3</h2>

        <?php

            /**
             * @return array<int>
             */
            function createArray()
            {
                $array_length = rand(3, 7);
                $array = array();
                for ($i = 0; $i < $array_length; $i++) {
                    array_push($array, rand(10, 20));
                }
                return $array;
            }

            /**
             * @param array<int> $array1
             * @param array<int> $array2
             * @return array<int>
             */
            function mergeSortedUniqueArrays($array1, $array2)
            {
                $merged = array_merge($array1, $array2);
                $merged = array_unique($merged);
                sort($merged);
                return $merged;
            }

            $array = createArray();
            $array2 = createArray();
            echo '<h2>Масив 1: ' . implode(', ', $array) . '</h2>';
            echo '<h2>Масив 2: ' . implode(', ', $array2) . '</h2>';
            echo '<h2>Результат: ' . implode(', ', mergeSortedUniqueArrays($array, $array2)) . '</h2>';
        ?>

        <h2>Завдання 2.4</h2>

        <?php
            function sort_users($users, $sort_by)
            {
                if ($sort_by == 'name') {
                    ksort($users);
                } else if ($sort_by == 'age') {
                    asort($users);
                }
                return $users;
            }

            $users = array(
                'Іван' => 25,
                'Петро' => 30,
                'Олег' => 20,
                'Марія' => 22
            );

            $sorted_by_name = sort_users($users, 'name');
            $sorted_by_age = sort_users($users, 'age');

            echo '<h2>Початковий масив:</h2>';
            foreach ($users as $name => $age) {
                echo "<h2>$name: $age</h2>";
            }

            echo '<h2>Сортування за іменем:</h2>';
            foreach ($sorted_by_name as $name => $age) {
                echo "<h2>$name: $age</h2>";
            }

            echo '<h2>Сортування за віком:</h2>';
            foreach ($sorted_by_age as $name => $age) {
                echo "<h2>$name: $age</h2>";
            }
        ?>
    </body>
</html>
