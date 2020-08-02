<?php 
require_once "pdo.php";
// header('Content-Type: text/enriched/font-woff');

if (isset($_POST['name'])){
    $sql = "DELETE FROM people WHERE name=:name";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name']
    ));
}


?>

<html>
<head></head>
<body>

<p> Input the name whom you want to delete</p>
<form method="post">
    <p>Name:<input type="text" name="name" size="40"></p>
    <p><input type="submit" value = "DELETE!"></p>
</form>
</body>
</html>