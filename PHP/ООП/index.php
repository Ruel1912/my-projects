<?php
    require_once 'classes/Arr.php';
    require_once 'classes/City.php';
    require_once 'classes/Employee.php';
    require_once 'classes/Student.php';
    require_once 'classes/User.php';

    $cities = [
        new City('Moscow', 30531420),
        new City('Paris', 305012),
        new City('London', 123050),
    ];

    echo "<pre>";
    foreach ($cities as $city) {
        echo $city->name . ' ' . $city->population . '<br>';
    }



    $student = new Student('Mikhail');
    echo $student->getCourse(); // выведет 1 - начальное значение
    $student->transferToNextCourse(); // переведем студента на следующий курс
    echo $student->getCourse() . '<br>'; // выведет 2
    print_r($student);

    $arr = new Arr([4, 5, 6]);
    print_r($arr);
    echo $arr->getAvg() . '<br>';


    $city = new City('Kaluga', 123434);

    $cityProps = ['name', 'population'];

    foreach($cityProps as $cityProp) {
        echo $city->$cityProp . '<br>';
    }
    echo "</pre>";


