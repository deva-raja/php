<?php

class Human
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function display()
    {
        echo $this->name . 'is ' . $this->age . 'years old';
    }
    public function setName($name)
    {
        $this->name = $name;
        return 'Name has been updated' . '<br/>';
    }
    public function showName()
    {
        return $this->name;
    }
}

$vinu = new Human('vinu', 23);
echo $vinu->setName('anu');
echo $vinu->showName();
