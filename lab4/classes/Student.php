<?php

namespace classes;

class Student extends Human
{
    private $university;
    private $course;

    public function __construct($gender, $age, $height, $weight, $university, $course)
    {
        parent::__construct($gender, $age, $height, $weight);
        $this->university = $university;
        $this->course = $course;
    }
public function getUniversity()
    {
        return $this->university;
    }

    public function setUniversity($university)
    {
        $this->university = $university;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function promote()
    {
        $this->course++;
    }

    protected function birthMessage()
    {
        echo "Народження студента<br>";
    }

    public function cleanRoom()
    {
        echo 'Студент прибирає кімнату<br>';
    }

    public function cleanKitchen()
    {
        echo 'Студент прибирає кухню<br>';
    }
}