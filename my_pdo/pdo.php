<?php
################################### STARTING WITH DATABASES ###################################

// So GRANT basically gives privileges to specific users, for example we might want person A to just to be able to INSERT data
// into a DB

// Format for GRANT statements: "GRANT privilegeType ON databasename.tablename TO grantees"
// https://linuxize.com/post/how-to-show-mysql-users/
// https://linuxize.com/post/how-to-create-mysql-user-accounts-and-grant-privileges/

// The following types of privileges can be granted:
//   Delete data from a specific table.
//   Insert data into a specific table.
//   Create a foreign key reference to the named table or to a subset of columns from a table.
//   Select data from a table, view, or a subset of columns in a table.
//   Create a trigger on a table.
//   Update data in a table or in a subset of columns in a table.
//   Run a specified function or procedure.
//   Use a sequence generator, a user-defined type, or a user-defined aggregate.


// To get started run the following SQL commands:

// CREATE DATABASE mis c;
// GRANT ALL ON misc.* TO 'fred'@'localhost' IDENTIFIED BY 'zap';
// GRANT ALL ON misc.* TO 'fred'@'127.0.0.1' IDENTIFIED BY 'zap';



// USE misc; (Or select misc in phpMyAdmin)

// CREATE TABLE users (
//    user_id INTEGER NOT NULL
//      AUTO_INCREMENT KEY,
//    name VARCHAR(128),
//    email VARCHAR(128),
//    password VARCHAR(128),
//    INDEX(email)
// ) ENGINE=InnoDB CHARSET=utf8;

// INSERT INTO users (name,email,password) VALUES ('Chuck','csev@umich.edu','123');
// INSERT INTO users (name,email,password) VALUES ('Glenn','gg@umich.edu','456');

# How we might use mysqli

// $mysqli = new mysqli("example.com", "user", "password", "database");
// $mysqli = new mysqli("http://localhost:8888/","root", "root", 'Music');
// $result = $mysqli->query("SELECT * AS _message FROM Music.Album");
// $row = $result->fetch_assoc();
// echo htmlentities($row['_message']);
// echo "<pre>";
$pdo = new PDO('mysql:host=localhost;port=8888;dbname=myexp', 'shivam', 'prasad');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $stmt = $pdo->query("SELECT * FROM Music.Album");

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     print_r($row);
// }
// echo "Connection to myexp established!";
// echo "</pre>";



?>