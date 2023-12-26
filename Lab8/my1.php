<?php

class Worker {
    private $name;
    private $salary;
	private $job;
	private $experience;

    public function __construct($name, $salary, $job, $experience) {
        $this->name = $name;
        $this->salary = $salary;
		$this->job = $job;
		$this->experience = $experience;
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        return $this->salary;
    }
	public function getJob() {
        return $this->job;
    }

	public function getExpirience() {
        return $this->experience;
    }
}

// Пример использования класса Worker
$workers = [
    new Worker("John", 5000, "developer", 10),
    new Worker("Mike", 7000, "owner", 20),
    new Worker("Alice", 6000, "police", 5),
    new Worker("Bob", 8000, "fireman", 2)
];

$desiredSalary = 6000;
$job = "developer";
$expirienc = 9;


//Сортировка по большей зарплате
$workersWithHigherSalary = array_filter($workers, function($worker) use ($desiredSalary) { 
    return $worker->getSalary() > $desiredSalary; //усли зарплата больше
});

//Сортировка по должности
$workersJob = array_filter($workers, function($worker) use ($job) {
    return $worker->getJob() == $job; //если должность равна
});

//Сортировка по стажу
$workersExpirience = array_filter($workers, function($worker) use ($expirienc) {
    return $worker->getExpirience() > $expirienc; //если стаж больше
});

//в форе выводим получившийся массив
foreach ($workersWithHigherSalary as $worker) {
    echo $worker->getName() . " имеет зарплату больше " . $desiredSalary . "(" . 	$worker->getSalary().  ")<br>";
}
//в форе выводим получившийся массив
foreach ($workersJob as $worker) {
    echo $worker->getName() . " имеет должность " . $job . "<br>";
}
//в форе выводим получившийся массив
foreach ($workersExpirience as $worker) {
    echo $worker->getName() . " имеет стаж больше " . $expirienc . "(" . 	$worker->getExpirience().  ") <br>";
}

?>