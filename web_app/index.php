

<html>
<?php header('Location: http://www.example.com/'); ?>
<head>
<title> Shivam Prasad PHP </title>
</head>
<body>
<h1> Shivam Prasad</h1>
<body>
  
<!-- Making the form for which we'll use to take the MD5 -->
<form action="#" method="get">
  <label for="MD5">Input the MD5 for which you want to crack</label>
  <input type="text" name="MD5" size="50" ><br><br>
  <input type="submit" value="Submit">
</form>

<ul>
<li><a href='encode_pin.php'> Encode PIN</a></li>
</ul>

<?php

// echo '<pre>';
  echo "Using PHP version: ", phpversion();
  printf("<br/>");
  echo "Also I'm using realtively newer version of PHP, have a great day!";
  printf("<br/>");
  printf("<br/>");
  $found = False;


  if (!isset($_GET['MD5']) || $_GET['MD5'] == ""){
    echo "No number has been set";
    printf("<br/>");

    $number = '';
   } else {
       $value = $_GET['MD5'];
       for($i = 0; $i < 10000; $i++){
        if (hash('md5', $i) == $value) {
          echo "PIN is: $i";
          $found = True;
          break;
        } 
      }
   }

   if ($found==False){
    echo "PIN: Not found";}
  
  ?>
</body>
</html>