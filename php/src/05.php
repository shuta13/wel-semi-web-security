<?php declare(strict_types=1);
// 1-1
$str = "PHPはPHP:Hypertext Preprocessorの略です";
print mb_strrpos($str, "PHP");
print "<br />";
// 1-2
$place = "弘前";
$temperature = 15.166;
printf("%sの気温は%.1f°Cです", $place, $temperature);
print "<br />";
// 1-3
$lower_str = "wings knowledge";
$lower_str_arr = preg_split("/\s/", $lower_str);
$upper_word_1 = ucfirst($lower_str_arr[0]);
$upper_word_2 = ucfirst($lower_str_arr[1]);
$upper_str = $upper_word_1 . " " . $upper_word_2;
print $upper_str;
print "<br />";
// 1-4
$ore_rio = "俺様はリオだ。";
$order = ["俺様", "リオ"];
$replace = ["俺", "ジョジョ"];
print str_replace($order, $replace, $ore_rio);
print "<br />";
// 2
$data = ["高江", "青木", "片淵"];
array_push($data, "山田", "日尾");
print_r($data);
print "<br />";
array_unshift($data, "掛谷", "土井");
print_r($data);
print "<br />";
print_r(array_slice($data, 3, 3));
print "<br />";
