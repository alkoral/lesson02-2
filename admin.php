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
  if ($_FILES['myfile']['error'] == UPLOAD_ERR_OK &&
    move_uploaded_file($_FILES['myfile']['tmp_name'], "tests/".$_FILES['myfile']['name'])) {
      echo "Файл <b>".$_FILES['myfile']['name']. "</b> с тестом загружен<br>";
      $new_file = "<br>Вы можете загрузить новый файл .JSON";
    }
    else
    {
      echo "Ошибка: файл с тестом не загружен!";
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