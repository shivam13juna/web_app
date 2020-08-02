<?php 
require_once "pdo.php";
// header('Content-Type: text/enriched/font-woff');
// print_r($_POST);
if (isset($_POST['name']) && isset($_POST['habit'])){
    $sql = "INSERT INTO people (name, habit) VALUES (:name, :habit)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':habit' => $_POST['habit']
    ));
    header("Location: thanks.php?name=".$_POST['name'].'&habit='.$_POST['habit']);

}


if (isset($_POST['delete'])){
    $sql = "DELETE FROM people WHERE name=:name";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['to_del']
    ));

    header("Location: thanks.php?todel=".$_POST['to_del']);

}

$stmt = $pdo->query("SELECT name, habit FROM people");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<html>
<head></head>
<body>
<table border="1">
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['name']);
    echo("</td><td>");
    echo($row['habit']);
    echo("</td><td>");
    echo('<form method="post"><input type="hidden" ');
    echo('name="to_del" value="'.$row['name'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("\n</form>\n");
    echo("</td></tr>\n");
}
?>
</table>

<p> Adding a new user and habit</p>
<form method="post">
    <p>Name:<input type="text" name="name" size="40"></p>
    <p>Habit:<input type="text" name="habit" size="40"></p>
    <p><input type="submit" value = "Add New"></p>
</form>
</body>
</html>