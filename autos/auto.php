<?php 
require_once "pdo.php";
session_start();
?>


<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<title>Shivam Prasad's Auto Page</title>
<body>
<div class="container">
 
<?php
// In production, if login information isn't available, use header('Location: another_site.php'). Not doing that here as we want to print "No user information"

if (isset($_SESSION['username']))
{
    $name = $_SESSION['username'];
    echo"<p><h1>Tracking Autos for $name</h1></p>";
    if ($_SERVER["REQUEST_METHOD"]=='POST'){
        if(count($_POST)!=0){
            if(strlen($_POST['make'])==0){
                echo "<p style='color: red;'>Make is empty, Make can not be empty</p>";
                }
            elseif(!is_numeric($_POST['mileage']) && !is_numeric($_POST['year'])){
                var_dump(!is_numeric($_POST['mileage']));
                var_dump(!is_numeric($_POST['year']));
                echo "<p style='color: red;'>Year and Mileage needs to be numeric</p>";
            
                }
            else{
            $make = $_POST['make'];
            $year = $_POST['year'];
            $mil = $_POST['mileage'];
            
            $sql = "INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)";
            $exec = $pdo->prepare($sql);
            $exec->execute(array(
                ':make'=>$make,
                ':year'=>$year,
                ':mileage'=>$mil
            ));
            echo "<p style='color: green;'>Record Inserted</p>";

            } // This bracket is for else
            } // This bracket is for count($_POST)
        

        
        } // This one is for $_SERVER['REQUEST_METHOD]
    
    echo"<form method='post'>";
    echo"<p>&nbsp; Make:&nbsp;  <input type='text' name='make' size='40'></p>";
    echo"<p>&nbsp; Year:&nbsp; &nbsp;<input type='text' name='year' size='40'></p>";
    echo"<p>Mileage: <input type='text' name='mileage' size='40'></p>";
    echo"<p>&nbsp;<input type='submit' name='submit' value = 'Add New'></p>";
    // echo"<p>&nbsp;<input type='submit' name = 'Logout' value = 'Logout'></p>";
    echo"</form>";

    echo "<a href='logout.php'><h3>Logout</h3></a>";


    echo"<p><h1>Automobiles DATA</h1></p>";
    $disp = $pdo->query("SELECT make, year, mileage FROM autos");
    $rows = $disp->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1' style='table-layout: fixed; width: 50%;'>";

    foreach ( $rows as $row ) {
        echo "<tr><td style='width:15%;text-align:center'>";
        echo($row['make']);
        echo("</td><td style='width:15%;text-align:center'>");
        echo($row['year']);
        echo("</td><td style='width:15%;text-align:center'>");
        echo($row['mileage']);
        echo("</td></tr>\n");
    }
    echo "</table>";




}
else{
    echo "No login information available, user not logged in!";
    
}
?>




</div>
<!-- <a link='autos.php'>  -->
</body>
</html>