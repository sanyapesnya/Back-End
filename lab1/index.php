<!DOCTYPE html>
<head>
    <style>
    body {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
    margin: 0;
    padding: 0;
    font-size: 48px;
    }

    h1, h2, h3, h4, h5, h6 {
    margin: 0;
    }

    h1 {
    text-align: center;
    }

    h2 {
    margin-top: 10px;
    }

    pre {
    margin: 0;
    }

    td {
    padding: 25px;
    }

    .color-1 {
    background-color: green;
    }

    .color-2 {
    background-color: orange;
    }

    .color-3 {
    background-color: blue;
    }

    .sheet {
    display: flex;
    width: 100%;
    position: relative;
    background-color: #000;
    margin-bottom: 30px;
    }

    .square {
    background-color: red;
    position: absolute;
    }
    </style>
</head>
<body>
    <h1>Лабораторна робота №1</h1>
    <h1>Сидоренко Роберт, ІПЗк-23-1</h1>
    <?php
        echo '<h2>Завдання 2</h2>';

        $slices = ['<u>тішили</u>', 'мене', 'вони...'];
        echo '<pre>Полину в мріях в купель океану,<br/>Відчую <b>шовковистість</b> глибини,<br/> Чарівні мушлі з дна собі дістану,<br/>   Щоб <b>взимку</b>';

        function print_slice(&$value, $key)
        {
            $spaces = str_repeat(' ', ($key + 2) * 3);
            echo '<br/>' . $spaces . $value;
        }

        array_walk($slices, 'print_slice');
        echo '</pre>';
    ?>


    <?php
        echo '<h2>Завдання 3</h2>';
        $exchange_rate = 38.6;
        $value = 1500;
        echo $value . ' грн. можна обміняти на ' . floor(($value / $exchange_rate)) . '$'
    ?>

    <?php
        echo '<h2>Завдання 4</h2>';

        $month_number = 6;
        $season = 'Зима';
        if ($month_number > 2 && $month_number < 6)
            $season = 'Весна';
        if ($month_number >= 6 && $month_number < 9)
            $season = 'Літо';
        if ($month_number >= 9 && $month_number < 12)
            $season = 'Осінь';

        if ($month_number < 1 && $month_number > 12)
            echo 'Невірний місяць року';
        else
            echo $season;
    ?>

    <?php
        echo '<h2>Завдання 5</h2>';

        $symbol = 'і';

        switch (strtolower($symbol)) {
            case 'а':
            case 'е':
            case 'и':
            case 'о':
            case 'у':
            case 'і':
                echo "Символ $symbol: голосний звук";
                break;
            default:
                echo "Символ $symbol: приголосний звук";
                break;
        }
    ?>

    <?php
        echo '<h2>Завдання 6</h2>';

        $random_number = mt_rand(100, 999);
        $number_digits = str_split($random_number);
        $sum = array_reduce($number_digits, function ($acc, $value) {
            return $acc + $value;
        }, 0);
        $reversed_number = strrev($random_number);
        $reversed_number_digits = str_split($reversed_number);
        rsort($reversed_number_digits);
        $biggest_reversed_number = implode('', $reversed_number_digits);

        echo 'Випадкове число: ' . $random_number;
        echo '<br/>Сума: ' . $sum;
        echo '<br/>Обернене число: ' . $reversed_number;
        echo '<br/>Обернене найбільше число: ' . $biggest_reversed_number;
    ?>

    <?php
        echo '<h2>Завдання 7</h2>';

        function draw_table($rows_count, $cols_count)
        {
            echo '<table>';
            for ($i = 0; $i < $rows_count; ++$i) {
                echo '<tr>';
                for ($j = 0; $j < $cols_count; ++$j) {
                    $color = mt_rand(1, 3);
                    echo "<td class='color-$color'></td>";
                }
                echo '</tr>';
            }
            echo '</table>';
        }

        function draw_rand_field($squares_count)
        {
            $grid_width = mt_rand(200, 400);
            $grid_height = mt_rand(200, 400);

            echo "<div class='sheet' style='max-width:{$grid_width}px; height:{$grid_height}px'>";
            for ($i = 0; $i < $squares_count; ++$i) {
                $square_width = mt_rand(25, 50);
                $square_height = mt_rand(25, 50);
                $position_x = mt_rand(0 + $square_width, $grid_width - $square_width);
                $position_y = mt_rand(0 + $square_height, $grid_height - $square_height);
                echo "<div class='square' style='left:{$position_x}px; top:{$position_y}px; width:{$square_width}px; height:{$square_height}px;'></div>";
            }
            echo '</div>';
        }

        echo '<h3>Таблиця</h3>';
        draw_table(6, 7);
        echo '<h3>Поле випадкових квадратів</h3>';
        draw_rand_field(10);
    ?>
</body>
