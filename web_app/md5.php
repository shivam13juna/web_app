<?php
echo '<pre>';
echo "Using PHP version: ", phpversion();
printf("<br/>");
// print_r($_POST);
// printf("<br/>");
// print("These are keys of _POST<br/>");
// print_r(array_keys($_POST));
// print("These are values of _POST<br/>");
// print_r(array_values($_POST));
// printf("<br/>");
// echo '</pre>';
$value = $_POST["MD5"];
// echo "Hash for the number $value is ", hash('sha256', $_POST['MD5']);

for($i = 0; $i < 10000; $i++){
  if (hash('sha256', $i) == $value) {
    echo "PIN is: $i";
  } 
}
?>
