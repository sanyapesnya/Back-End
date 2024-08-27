<?php

namespace classes;

use interfaces\HouseCleaning;

abstract class Human implements HouseCleaning
{
    protected $gender;
    protected $age;
    protected $height;
    protected $weight;

    public function __construct($gender, $age, $height, $weight)
    {
        $this->gender = $gender;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    abstract protected function birthMessage();

    public function giveBirth()
    {
        $this->birthMessage();
    }

}
