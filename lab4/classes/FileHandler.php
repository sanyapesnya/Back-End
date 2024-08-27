<?php

namespace classes;

class FileHandler
{
    public static $dir = 'text';

    public static function writeToFile($filename, $content)
    {
        $file = self::$dir . '/' . $filename;
        file_put_contents($file, $content, FILE_APPEND);
    }

    public static function readFromFile($filename)
    {
        $file = self::$dir . '/' . $filename;
        if (file_exists($file)) {
            return file_get_contents($file);
        } else {
            return 'File not found';
        }
    }

    public static function clearFile($filename)
    {
        $file = self::$dir . '/' . $filename;
        if (file_exists($file)) {
            return file_put_contents($file, '');
        } else {
            return 'File not found';
        }
    }
}
