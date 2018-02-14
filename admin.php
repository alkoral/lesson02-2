<?php
$footer = file_get_contents('footer.php');
$title = "Загрузка нового теста"; require("header.php");

$new_file = "Загрузить новый тест в формате .JSON";

/*echo "<pre>";
var_dump($_FILES);
var_dump($_POST);
echo "</pre>";*/
?>

<section>
<?php
  echo "<h1>Загрузка нового теста</h1>";

if (isset($_FILES['myfile']['name']) && !empty($_FILES['myfile']['name'])) {
    $temp_file = $_FILES['myfile']['tmp_name'];
    $go_test = file_get_contents($temp_file);
    $test_res = json_decode($go_test, true);
      if (!is_array($test_res)) {
        echo "<font color='red'>Ошибка: это не JSON-файл. Тест на сервер не загружен!</font><br><br>";
      }
      else {
        if (!array_key_exists('quest', $test_res) && !array_key_exists('answ', $test_res)  &&  !array_key_exists('right', $test_res)) {
          echo "<font color='red'>Ошибка: это JSON-файл, но не тест. Файл на сервер не загружен!</font><br><br>";
        }
        else {
          if ($_FILES['myfile']['error'] == UPLOAD_ERR_OK &&
          move_uploaded_file($_FILES['myfile']['tmp_name'], "tests/".$_FILES['myfile']['name'])) {
            echo "<font color='blue'>О чудо! Файл <b>".$_FILES['myfile']['name']. "</b> с тестом загружен</font><br>";
            $new_file = "<br>Вы можете загрузить новый файл .JSON";
        }
     }
  }
}

?>

  <form method="post" action="" enctype="multipart/form-data">
    <?php echo $new_file; ?><br><br>
    <input type="file" name="myfile"><br><br>
    <input type="submit" value="ОТПРАВИТЬ">
  </form>
</section>
<?php echo $footer; ?>