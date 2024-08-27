<?php

require_once 'autoload.php';

$userController = new controllers\UserController();
$userController->getInfo();
echo '<hr>';

$circle = new classes\Circle(2, 4, 12);
echo 'X: ' . $circle->getX() . '<br>';
echo 'Y: ' . $circle->getY() . '<br>';
echo 'Radius: ' . $circle->getRadius() . '<hr>';

$circle->setX(5);
$circle->setY(3);
$circle->setRadius(1);
echo 'X: ' . $circle->getX() . '<br>';
echo 'Y: ' . $circle->getY() . '<br>';
echo 'Radius: ' . $circle->getRadius() . '<hr>';

$circle2 = new classes\Circle(2, 3, 1);
echo 'X: ' . $circle2->getX() . '<br>';
echo 'Y: ' . $circle2->getY() . '<br>';
echo 'Radius: ' . $circle2->getRadius() . '<hr>';

if ($circle->intersect($circle2)) {
    echo 'Кола перетинаються';
} else {
    echo 'Кола не перетинаються';
}

echo '<hr>';

echo classes\FileHandler::readFromFile('file1.txt') . '<hr>';
classes\FileHandler::writeToFile('file2.txt', 'new file' . PHP_EOL);
echo classes\FileHandler::readFromFile('file2.txt');
classes\FileHandler::clearFile('file3.txt');

echo '<hr>';

//$human = new classes\Human('male', 18, 176, 70);
//echo "Human<br>Gender: {$human->getGender()}<br>Age: {$human->getAge()}<br>Height: {$human->getHeight()}<br>Weight: {$human->getWeight()}<hr>";

$student = new classes\Student('male', 19, 176, 70, "ZTU", 3);
$student->giveBirth();
$student->setHeight(180);
$student->setWeight(74);

$student->cleanRoom();
$student->cleanKitchen();
echo "Student<br>Gender: {$student->getGender()}<br>Age: {$student->getAge()}<br>Height: {$student->getHeight()}<br>Weight: {$student->getWeight()}<br>University: {$student->getUniversity()}<br>Course: {$student->getCourse()}<hr>";

$programmer = new classes\Programmer('male', 20, 176, 70, ['PHP', 'JavaScript'], 2);
$programmer->giveBirth();
$programmer->setHeight(184);
$programmer->setWeight(78);
$languages_str = implode(', ', $programmer->getLanguages() );

$programmer->cleanRoom();
$programmer->cleanKitchen();
echo "Programmer<br>Gender: {$programmer->getGender()}<br>Age: {$programmer->getAge()}<br>Height: {$programmer->getHeight()}<br>Weight: {$programmer->getWeight()}<br>Languages: {$languages_str}<br>Experience: {$programmer->getExperience()} years<hr>";