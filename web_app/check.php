<?php

echo "<pre>\n";
echo 'display_errors = ' . ini_get('display_errors') . "\n";

if ( ini_get('display_errors') == 1 ) {
    echo("It is all good...\n");
    echo phpinfo()[System];
    echo "</pre>\n";
    return;
}

echo("YOU ARE IN VERY BAD SHAPE!!!!!!\n");
echo("You need to edit this file:\n\n");
echo(php_ini_loaded_file()."\n\n");
echo("And set\n\n");
echo("display_errors = On\n\n");
echo("Until you do this, you will be very very unhappy doing PHP development\n");
echo("in this PHP environment.\n");

echo "</pre>\n";


/* 

How to include Files in PHP

include "header.php"; //- Pull the file in here, if it's not there it's non fatal
require "header.php"; // Everything like include, just that Require is fatal

include_once "header.php";
require_once "header.php";

*/


?>
