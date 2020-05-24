<?php declare(strict_types = 1);
$x = 10;
function hoge(): int {
  $x = 1;
  return $x;
}
print hoge(); // 1
print $x; // 10

// 可変長
function sum(float ...$args): float {
  $result = 0;
  foreach ($args as $arg) {
    $result += $arg;
  }
  return $result;
}
print sum(1, 2, 3, 4, 5) . "<br />";
// print sum("1", 2); // error (strict types 1)

// いわゆるスプレッド構文
$arr = [0, 1, 2, 3, 4];
var_dump(...$arr);
print "<br />";

// 可変関数・再帰・高階関数・無名関数とか
// 可変・再帰
function func(float $n): float {
  $result = $n;
  while ($n > 1) {
    $result *= --$n;
    func($n);
  }
  return $result;
}
$factorial = "func";
print $factorial(4) . "<br />";
// 高階
function walk_array(array $array, callable $func) {
  foreach($array as $value) {
    $func($value);
  }
}
// callback
function num_print($num) {
  print $num . "<br />";
}
walk_array($arr, "num_print");
// 無名
walk_array($arr, function($value) {
  print $value;
});