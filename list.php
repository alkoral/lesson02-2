<?php
$header = file_get_contents('header.php');
$footer = file_get_contents('footer.php');
$title = "Все тесты для задания"; require("header.php");

$i=0;
$directory = "tests/";
?>

<article>
<section>
  <h1>Все тесты</h1>
  <ul>
<?php
  foreach (glob($directory."*.json") as $jsonname) {
    $get_test = file_get_contents($jsonname);
    $i = ++$i;
    $tests_arr = json_decode($get_test, true);
    $jsonname = $tests_arr['quest'];
    echo "<li><a href='test.php?num=".$i."'>".$jsonname."</a></li>\n";
    }
?>
  </ul>

</section>
<?php echo $footer; ?>