<?php
class Cat {
    private $name;
    private $color;
    public $weight;

    public function __construct(string $name, string $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello() {
        echo 'Привет! Меня зовут ' . $this->name . '. Моя шерсть имеет ' . $this->color . ' цвет.';
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getColor(): string {
        return $this->color;
    }
}

$cat1 = new Cat('Мурка', 'white');
$cat1->sayHello();