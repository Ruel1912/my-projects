<?php

namespace App\Http\Controllers;

class UserController extends Controller {
  
  public function show() {
    return view('user.show');
  }

  public function city($username) {
    $users = [
      'user1' => 'city1',
      'user2' => 'city2',
      'user3' => 'city3',
      'user4' => 'city4',
      'user5' => 'city5',
    ];

    return isset($users[$username]) ? $users[$username] : "Такого юзера нет!";
  }

  public function all() {
    $currDay = 10;
    $lastDay = 29;
    $months = [];

    for($i = 1; $i <= $lastDay; $i++) $months[] = $i;
    return view('user.all', [
      'myData' => [
        'name' => 'Михаил',
        'surname' => 'Катагаров',
        'age' => 18,
        'salary' => "70.000 р",
      ],
      'location' => [
        'country' => 'Турция',
        'city' => 'Стамбул',
      ],
      'birthday' => [
        'year' => 2004,
        'month' => 12,
        'day' => 19,
      ],
      'isProger' => true,
      'inp1' => 'Первый инпут',
      'inp2' => 'Второй инпут',
      'inp3' => 'Третий инпут',
      'color' => '#f00',
      // 'city' => 'Краснодар',
      'linkHref' => 'https://vk.com/mkatagarov',
      'linkText' => 'Посмотреть мой вк',
      'numbers' => [1, 2, 3, 4, 5, 6, 0, 7, 8, 9, 10],
      'employees' => [
        [
          'name' => 'user1',
          'surname' => 'surname1',
          'salary' => 1000,
        ],
        [
          'name' => 'user2',
          'surname' => 'surname2',
          'salary' => 2000,
        ],
        [
          'name' => 'user3',
          'surname' => 'surname3',
          'salary' => 3000,
        ],
        [
          'name' => 'user4',
          'surname' => 'surname4',
          'salary' => 4000,
        ],
        [
          'name' => 'user5',
          'surname' => 'surname5',
          'salary' => 5000,
        ],
      ],
      'users' => ['user1', 'user2', 'user3'],
      'str' => '<b>text</b>',
      'links' => [
        [
          'text' => 'text1',
          'href' => 'href1',
        ],
        [
          'text' => 'text2',
          'href' => 'href2',
        ],
        [
          'text' => 'text3',
          'href' => 'href3',
        ],
      ],
      'useres' => [
        [
          'name' => 'user1',
          'surname' => 'surname1',
          'banned' => true,
        ],
        [
          'name' => 'user2',
          'surname' => 'surname2',
          'banned' => false,
        ],
        [
          'name' => 'user3',
          'surname' => 'surname3',
          'banned' => true,
        ],
        [
          'name' => 'user4',
          'surname' => 'surname4',
          'banned' => false,
        ],
        [
          'name' => 'user5',
          'surname' => 'surname5',
          'banned' => false,
        ],
      ],
      'months' => $months,
      'currDay' => $currDay,
    ]);
  }

  public function index() {
    return view('user.index', [
      'text' => 'Кокой-то текст чтоле',
      'title' => 'Какой-то тайтл',
    ]);
  }

  public function about() {
    return view('user.about');
  }

  public function contact() {
    return view('user.contact');
  }
}
?>