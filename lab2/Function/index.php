<?php
include 'func.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../globals.css">
    <title>Lab 2 Task 4</title>
</head>
<body>
        <table>
            <tr>
                <th>Функція</th>
                <th>Результат</th>
            </tr>
            <tr>
                <td>my_pow(4, 3)</td>
                <td><?php echo my_pow(4, 3); ?></td>
            </tr>
            <tr>
                <td>my_factorial(4)</td>
                <td><?php echo my_factorial(4); ?></td>
            </tr>
            <tr>
                <td>my_tg(4)</td>
                <td><?php echo my_tg(4); ?></td>
            </tr>
            <tr>
                <td>sin(4)</td>
                <td><?php echo my_sin(4); ?></td>
            </tr>
            <tr>
                <td>cos(4)</td>
                <td><?php echo my_cos(4); ?></td>
            </tr>
            <tr>
                <td>tg(4)</td>
                <td><?php echo tg(4); ?></td>
            </tr>
        </table>
</body>
</html>
