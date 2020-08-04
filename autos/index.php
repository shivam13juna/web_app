<?php 
require_once "pdo.php";
session_start();
$log_des = "log";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// header('Content-Type: text/enriched/font-woff');
if ($_SERVER["REQUEST_METHOD"]=='POST'){
    // echo "<pre>";
    // print_r($_POST);
    
    // print_r($_SERVER);

    if(count($_POST)!=2){
        echo "Email and Password are required";
        $salt = 'XuGka$2(&3_';
        error_log("Login fail ".$_POST['who']." and password inputted is ".hash('sha256', $salt.$_POST['pass']), 3, $log_des);


    }
    else{
        if(!strpos($_POST['who'], '@')){
            error_log("Login fail ".$_POST['who']." and password inputted is ".hash('sha256', $salt.$_POST['pass']).PHP_EOL, 3, $log_des);

        }
        else{

            $salt = 'XuGka$2(&3_';
            $email = $_POST['who'];
            $psswd = hash('sha256', $salt.$_POST['pass']);

            // echo $email, $psswd;
            $check = $pdo->prepare("SELECT username FROM identity WHERE username = :username AND psswd = :psswd");
            $check->execute([
                'username' => $email,
                'psswd' => $psswd
            ]);
            $user = $check->fetch(PDO::FETCH_ASSOC);

            if (isset($user) && !empty($user)){
                # This will mean that user already exists, and we don't need to add him again in the database
                // echo "Welcome back ",$email;
                error_log("Returning USER, Login Successful ".$email." and password inputted is ".$psswd.PHP_EOL, 3, $log_des);
                $_SESSION['username'] = $email;
                $_SESSION['pass'] = $psswd;
                $_SESSION['old_customer'] = True;

                header('Location: auto.php');


                }
            else{
                echo "<p style='color: red;'>Incorrect Password</p>";


                }
        }

    
        
    }
    // echo "Checking if @ is in email, ", strpos($_POST['who'], '@');
    // echo count($_POST) == 2 ? '' : 'Email and Password are required';
    // echo "</pre>";


}


   
// if (isset($_POST['name']) && isset($_POST['habit'])){
//     $sql = "INSERT INTO people (name, habit) VALUES (:name, :habit)";
//     echo("<pre>\n".$sql."\n</pre>\n");
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(array(
//         ':name' => $_POST['name'],
//         ':habit' => $_POST['habit']
//     ));
//     header("Location: thanks.php?name=".$_POST['name'].'&habit='.$_POST['habit']);

// }


// if (isset($_POST['delete'])){
//     $sql = "DELETE FROM people WHERE name=:name";
//     echo("<pre>\n".$sql."\n</pre>\n");
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(array(
//         ':name' => $_POST['to_del']
//     ));

//     header("Location: thanks.php?todel=".$_POST['to_del']);

// }

// $stmt = $pdo->query("SELECT name, habit FROM people");
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<title>Shivam Prasad's Login Page</title>
<body>
<div class="container">

<p><h1>Please Log In</h1></p>
<?php
if ($_SERVER["REQUEST_METHOD"]=='POST'){
    if(count($_POST)==2){
        if(!strpos($_POST['who'], '@')){
            echo "<p style='color: red;'>Email must have an at-sign (@)</p>";
            }
        }
    }
?>
<form method="post">
    <p>&nbsp; User Name: <input type="text" name="who" size="40", id="nam"></p>
    <p>&nbsp; Password:&nbsp; &nbsp;<input type="password" name="pass" size="40" id="psswd"></p>
    <p>&nbsp;<input type="submit" name='Add' value = "Log In"></p>
</form>

</div>
<!-- <a link='autos.php'>  -->
</body>
</html>