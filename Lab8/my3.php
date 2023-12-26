<?php

//Графические объекты класс
abstract class GraphicObject {
    protected $x;
    protected $y;
    
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    
    abstract public function draw();
    abstract public function printSize();
}

//Круг родитель - графический обьекц
class Circle extends GraphicObject {
    private $radius;
    
    public function __construct($x, $y, $radius) {
        parent::__construct($x, $y);
        $this->radius = $radius;
    }
    
    public function draw() {
        echo "Рисуем круг ($this->x, $this->y)" . PHP_EOL;
    }
    
    public function printSize() {
        echo "Радиус круга: $this->radius" . PHP_EOL;
    }
}

class Square extends GraphicObject {
    private $sideLength;
    
    public function __construct($x, $y, $sideLength) {
        parent::__construct($x, $y);
        $this->sideLength = $sideLength;
    }
    
    public function draw() {
        echo "". PHP_EOL;
        echo "<br> Рисуем квадрат с ($this->x, $this->y)" . PHP_EOL;
    }
    
    public function printSize() {
        echo "Размер: $this->sideLength" . PHP_EOL;
    }
}

$circle = new Circle(5, 10, 3);
$square = new Square(2, 7, 4);

$circle->draw();
$circle->printSize();

$square->draw();
$square->printSize();

?>