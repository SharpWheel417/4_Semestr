<?php
echo "<hr />";
echo "<h1>Задание 3</h1>";
echo "<h1> Напечатать самое длинное слово в тексте из файла </h1>";
echo "<meta charset='UTF-8'>";

$str=file_get_contents("text.txt");
$words = explode(" ", $str);
$longestWord = "";

foreach($words as $word) {
    if(strlen($word) > strlen($longestWord)) {
        $longestWord = $word;
    }
}
echo "<br><p style='text-align:center; font-size:40px;'>Текст из фалйа: $str</p>";
echo "<br><p style='text-align:center; font-size:40px;'>Самое длинное слово: $longestWord</p>";
 ?>