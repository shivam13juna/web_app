<?php
################################### STARTING WITH DATABASES ###################################
// CREATE TABLE autos (
// 	auto_id	INTEGER NOT NULL AUTO_INCREMENT,
// 	make	TEXT,
// 	year	INTEGER,
// 	mileage	INTEGER,
// 	PRIMARY KEY(auto_id)
// )
$pdo = new PDO('mysql:host=localhost;port=8888;dbname=automobile', 'shivam', 'prasad');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $stmt = $pdo->query("SELECT * FROM automobiles.autos");

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     print_r($row);
// }
// echo "Connection to myexp established!";
// echo "</pre>";



?>