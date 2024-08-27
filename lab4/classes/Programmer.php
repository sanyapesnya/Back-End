<?php

namespace classes;

class Programmer extends Human
{
    private $languages = [];
    private $experience;

    public function __construct($gender, $age, $height, $weight, $languages, $experience)
    {
        parent::__construct($gender, $age, $height, $weight);
        $this->languages= $languages;
        $this->experience = $experience;
    }

    public function getLanguages()
    {
        return $this->languages;
    }

    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function learnLanguage($language)
    {
        $this->languages[] = $language;
    }

    protected function birthMessage()
    {
        echo "Народження програміста<br>";
    }

    public function cleanRoom()
    {
        echo 'Програміст прибирає кімнату<br>';
    }

    public function cleanKitchen()
    {
        echo 'Програміст прибирає кухню<br>';
    }
}