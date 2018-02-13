<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/
$num = $_GET['num'];
$url = "tests/test-".$num.".json";

if (!file_exists($url)) {
  echo "<center><h1>Такого теста нет</h1>";
  echo "<h3>(<a href='list.php'>вернуться к списку тестов</a>)</h3></center>";
  exit;
}

$text = file_get_contents($url);
$data = json_decode($text, true);

$question = $data['quest'];
$answ = $data['answ'];
$right = $data['right'];
$check = "radio";
$ans="ans";

if (is_array($right)) {
  $right = implode(", ", ($data['right']));
  $check = "checkbox";
  $ans="ans[]";
}

if (empty($_POST['ans'])) {
  $result = "Перед нажатием кнопки выберите правильный вариант ответа";
}
  elseif (!is_array($_POST['ans'])) {
    $res = ($_POST['ans']);
    if ($res == $right) {
      $result = "Ваш выбор: <b>&laquo;".$res."&raquo;</b>. <font color=green>Это правильный ответ</font>. Поздравляю!";
    } else {
      $result = "Ваш выбор: <b>&laquo;".$res."&raquo;</b>. <font color=red>Это неверный ответ</font>. Попробуйте снова";
    }
}
  else {
    $res = ($_POST['ans']); 
    $res = implode(", ", ($res));     
    if ($res == $right) {
      $result = "Ваш выбор: <b>&laquo;".$res."&raquo;</b>. <font color=green>Это правильный ответ</font>. Поздравляю!";
    } else {
      $result = "Ваш выбор: <b>&laquo;".$res."&raquo;</b>. <font color=red>Это неверный ответ</font>. Попробуйте снова";
  }
}

$footer = file_get_contents('footer.php');
$title = "Тест №".$num; require("header.php");

?>

<section>
  <h1>Тест №<?php echo $num; ?> </h1>
  <form action="" method="POST">
    <?php echo "<fieldset>\n";
    echo "<legend> <b>".$question."</b> </legend>\n";
      for ($i=0; $i<count($answ); $i++)
    echo "<label><input type='$check' name='$ans' value='$answ[$i]'>$answ[$i]</label>\n<br>";
?>

    </fieldset><br>
    <input type="submit" value="ПРОВЕРИТЬ">
  </form>
<br>
<?php echo $result; ?>

</section>
<?php echo $footer; ?>