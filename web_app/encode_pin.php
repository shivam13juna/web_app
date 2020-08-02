<html>
<head>
<title> Shivam Prasad PHP </title>
</head>
<body>
<h1> Shivam Prasad</h1>
<body>

  <?php
  // echo '<pre>';
  if (!isset($_GET['MD5']) || $_GET['MD5'] == ""){
    echo "No number has been set";
    $number = '';
   } else {
       $value = $_GET['MD5'];
       echo "Hash of $value is: ", hash('md5', $value);

   }
  ?>
<!-- Making the form for which we'll use to take the MD5 -->
<form action="#" method="get">
  <label for="MD5">Input the pin for which you want to generate MD5</label>
  <input type="text" name="MD5"  size="50" style="direction: ltl;"><br><br>
  <input type="submit" value="Submit">
</form>

<ul>
<li><a href='encode_pin.php'> Encode PIN</a></li>
<li><a href='index.php'> Go back to Main Page</a></li>
</ul>
</body>
</html>


