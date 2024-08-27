<?php
function delete_file()
{
    if (isset($_POST['delete_file'])) {
        if (file_exists($_POST['delete_file'])) {
            $filename = $_POST['delete_file'];
        } else {
            echo 'Файл не знайдено!';
            exit();
        }
        if (preg_match('/^result\d+\.txt$/', $filename)) {
            unlink($filename);
            echo "Файл $filename успішно видалено!";
        } else {
            echo "Неможливо видалити файл $filename";
        }
    }
}

function write_words_to_file($filename, $array)
{
    $handle = fopen("$filename", 'w');
    foreach ($array as $word) {
        fwrite($handle, $word . PHP_EOL);
    }

    fclose($handle);
}

function render_words_table($title, $array)
{
    echo "<div><h3>$title</h3>";
    echo '<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Word</th>
        </tr>
    </thead>
    <tbody>';
    for ($i = 0; $i < count($array); $i++) {
        echo "<tr><td>$i</td>";
        echo "<td>$array[$i]</td></tr>";
    }
    echo '</tbody></table></div>';
}

function read_all_words($array)
{
    $words = [];
    foreach ($array as $words_line) {
        $words = array_merge($words, explode(' ', $words_line));
    }
    return $words;
}

function common_words($array1, $array2)
{
    return array_values(array_intersect($array1, $array2));
}

function repeated_words($array)
{
    return array_keys(
        array_filter(array_count_values($array), function ($value) {
            return $value > 2;
        })
    );
}

$file1_words = read_all_words(
    file('file1.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
);
$file2_words = read_all_words(
    file('file2.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
);
$file3_words = read_all_words(
    file('file3.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
);

$unique_file1_words = array_keys(
    array_count_values(array_diff($file1_words, $file2_words))
);

$common_words = common_words($file1_words, $file2_words);

$repeated_file1_words = repeated_words($file1_words);
$repeated_file2_words = repeated_words($file2_words);

render_words_table('File 1 words', $file1_words);
render_words_table('File 2 words', $file2_words);
render_words_table('Unique file 1 words', $unique_file1_words);
render_words_table('Common words', $common_words);
render_words_table(
    'Repeated file 1 words more than 2 times',
    $repeated_file1_words
);
render_words_table(
    'Repeated file 2 words more than 2 times',
    $repeated_file2_words
);

sort($file3_words);
render_words_table('Sorted words', $file3_words);

write_words_to_file('result1.txt', $unique_file1_words);
write_words_to_file('result2.txt', $common_words);
write_words_to_file(
    'result3.txt',
    array_merge($repeated_file1_words, $repeated_file2_words)
);
write_words_to_file('sorted.txt', $file3_words);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../globals.css" />
        <title>Lab 3 Task 3</title>

        <style>
        body {
            padding: 12px 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: start;
            grid-gap: 24px;
        }
        body, table {
            font-size: <?php echo isset($_COOKIE['font_size'])
                ? $_COOKIE['font_size']
                : '22px'; ?>
            }
        </style>
    </head>
    <body>
        <form method="POST" action="">
            <label>Введіть ім'я файлу для видалення:</label>
            <input type="text" name="delete_file" required>
            <button type="submit">Видалити файл</button>
            <?php delete_file(); ?>
        </form>
    </body>
</html>
