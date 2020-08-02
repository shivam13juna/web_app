<?php 
// header('Content-Type: text/enriched/font-woff');
// echo "<pre>";
// echo "This is $_GET";
// echo "</pre>";
require_once "pdo.php";


if (isset($_GET['name']) && isset($_GET['habit'])){
    $nam = $_GET['name'];
    $hab = $_GET['habit'];
    echo "Thank you, the name $nam and their $hab have been inserted in the database successfully ";
}


if (isset($_GET['todel'])){
    $todel = $_GET['todel'];
    echo "Thank you, $todel has been successfully deleted from the database";
}


$stmt = $pdo->query("SELECT name, habit FROM people");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "This is the updated Databas\n";
?>
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

