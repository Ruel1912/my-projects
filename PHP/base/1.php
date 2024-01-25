<?php
  // Найдите позицию первого элемента '-' и удалите его с помощью функции array_splice.
	$arr = ['a', '-', 'b', '-', 'c', '-', 'd'];

  // print_r($arr);
  $index = array_search('-', $arr);
  $arr_splice = array_splice($arr, $index, 1);

  print_r($arr);
?>