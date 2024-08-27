<?php
function my_sin($x)
{
    return sin($x);
}

function my_cos($x)
{
    return cos($x);
}

function tg($x)
{
    return tan($x);
}

function my_tg($x)
{
    $sin = my_sin($x);
    $cos = my_cos($x);

    if ($cos == 0) {
        return Undefined;
    }

    return my_sin($x) / my_cos($x);
}

function my_pow($x, $y)
{
    return pow($x, $y);
}

function my_factorial($x)
{
    if ($x < 0) {
        return 'Undefined';
    }

    if ($x == 0) {
        return 1;
    }

    return $x * my_factorial($x - 1);
}
