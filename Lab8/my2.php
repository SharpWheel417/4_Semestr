<?php
class PassengerTransport {
    protected $name;
    protected $speed;
    protected $cost;

    //Конструктор класса
    public function __construct($name, $speed, $cost) {
        $this->name = $name;
        $this->speed = $speed;
        $this->cost = $cost;
    }

    //Расчет времени проезда
    public function getTravelTime($distance) {
        return $distance / $this->speed;
    }

    //Расчет стоимости проезда
    public function getTravelCost($distance) {
        return $distance * $this->cost;
    }
}

class Airplane extends PassengerTransport {
    public function __construct($name, $speed, $cost) {
        parent::__construct($name, $speed, $cost);
    }
}

class Car extends PassengerTransport {
    public function __construct($name, $speed, $cost) {
        parent::__construct($name, $speed, $cost);
    }
}

class Train extends PassengerTransport {
    public function __construct($name, $speed, $cost) {
        parent::__construct($name, $speed, $cost);
    }
}

//Тип, скорость, стоисость
$airplane = new Airplane("Самолет", 300, 100);
$car = new Car("Автомобиль", 120, 50);
$train = new Train("Поезд", 200, 30);

$distance = 500; // расстояние в километрах

echo "Время и стоимость передвижения на самолете:<br>";
echo "Время: " . $airplane->getTravelTime($distance) . " часов<br>";
echo "Стоимость: " . $airplane->getTravelCost($distance) . " Рублей<br><br>";

echo "Время и стоимость передвижения на автомобиле:<br>";
echo "Время: " . $car->getTravelTime($distance) . " часов<br>";
echo "Стоимость: " . $car->getTravelCost($distance) . " <br><br>";

echo "Время и стоимость передвижения на поезде:<br>";
echo "Время: " . $train->getTravelTime($distance) . " часов<br>";
echo "Стоимость: " . $train->getTravelCost($distance) . " долларов<br><br>";

?>