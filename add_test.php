<?php

// Тест 1
/*
$new_test = [
  "quest" => "Название моря, в котором нельзя искупаться",
  "answ" =>
    ["Белое", "Желтое", "Зеленое", "Красное", "Черное"],
  "right" => "Зеленое"
];
*/
//  Тест 2
/*
$new_test = [
  "quest" => "В сказке «Приключения Буратино» встречается:",
  "answ" =>
    ["Карло", "Клара", "Кораллы", "Кларнет"],
  "right" => "Карло"
];
*/

//*Тест 3
/*
$new_test = [
  "quest" => "Как заканчивается присказка: «Мы и сами с…»?",
  "answ" =>
    ["С волосами", "С усами", "С часами", "С долгами"],
  "right" => "С усами"
];
*/
//Тест 4
/*
$new_test = [
  "quest" => "Что растёт в огороде?",
  "answ" =>
    ["Арбалет", "Лук", "Стрела", "Тетива"],
  "right" => "Лук"
];
*/
$new_test = [
  "quest" => "Назовите все нечетные числа",
  "answ" =>
    ["Один", "Два", "Три", "Четыре", "Пять", "Шесть", "Семь"],
  "right" =>
    ["Один", "Три", "Пять", "Семь"] 
];

$new_file = json_encode($new_test, JSON_UNESCAPED_UNICODE);

$fp = fopen('test.json', 'w');
$write = fwrite($fp, $new_file); // Запись в файл
if ($write) echo 'Данные успешно занесены в файл.';
else echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла
/*echo "<pre>";
print_r($new_test);*/
$get = file_get_contents("test.json");
$new = json_decode($get, true);
echo "<pre>";
print_r($new);
echo "<h2><a href='admin.php'>Перенести файл в папку с тестами</a></h2>";
?>
