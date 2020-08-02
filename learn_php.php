<!-- This Tutorial is primarily for Learning PHP  -->

<?php

echo "Hi there. \n";
 $answer = 6 * 7; //Variables start with $
echo "The annswer is $answer, what";
echo "was the question again?\n";

$x = 5; 
$y = array("x" => "Hello"); // Here Hello is assigned to x
print $y["x"];

// Every line needs to end in ;
echo "You can have embedded newlines
strings this way as it is
okay to do"; // php adds up \n in above lines

$expand = 12;
echo "Variables, do $expand \n"; // Although expand here is in " ", still expand's value will be used, not the string "$expand"
// \n doesn't work in single quoted strings, neither does $expand expands in single quoted strings

# These are tools you can use to flush output

echo $x;
echo("\n");
echo $x, "\n";
print $x; 
print "\n";
print($x);
print("\n"); # Note how we're using double quotes, not single ones. \n doesn't work in single ones. 


# Some Aggressive implicit type conversion

$z = "15" + 27;
echo($x); # it'll give 42, converts 15 to number as + is a numeric operand. 

// There are increment and decrement (++ --)
// String Concatenation(.)
// Equality(== and !=)
// Identity( === and !==) there's no type conversion in checking equality
// Ternary (?:)

$x = 12;
$y = 15 + $x++; // Here y is 27, as x++ increases x but increased x isn't the value going in y
echo "x is $x and y is $y\n"; 

// How to make list equivalent (python) in PHP

$stuff = array("Hi", "There"); # Example of list, just contains element
echo $stuff[1], "\n";

// How to make dict equivalent (python) in PHP

$ano_stuff = array("name" => "shivam", 
                        "course" => "php");
// or you can do
$ano_stuff['name'] = 'shivam';
$ano_stuff['course'] = 'php';

echo $stuff['course'], "\n";

// use var_dump for printing more verbose

// Another way you can make array
$va = array();
$va[] = "hello";
$va[] = "world";
print_r($va);

// Now let's learn how to loop through array

foreach($stuff as $k => $v){
    echo 'key=', $k, ' val=', $v, "\n";
}

// another way

for($i = 0; $i < count($stuff); $i++){
    echo "I =", $i, " Val=", $stuff[$i], "\n";
}

// Some popular functions in Array

array_key_exists("value", $stuff); // self explanatory
isset($stuff['key']); // if key is set
count($stuff); // how many elements in array
is_array($stuff); // If variable is an array
sort($stuff); // Sorts the array values, but loses key)
ksort($stuff); // Sorts the array by key
asort($stuff); // Sorts the array by value, but keeping key association
shuffle($stuff); // Shuffles

// What's explode? 

$inp = "This is a sentence with seven words";
$temp = explode(' ', $inpu);
print_r($temp);

// some examples on string in PHP, strrev, str_repeat, strtoupper, strlen

function greet(){
    print "Hello\n";
}

greet();
echo greet()."glen";

function triple(&$value){
    $value = $value * 3;
}

$val = 10; 
triple($val);
echo "Triple = $val\n";

// Another set of functions we use for checking strings

strlen($val);
is_numeric($val);
strpos($var, '@'); # Just check if @ is in $var

// Object Oriented Programming, creating class

class Person{
    protected $value=5; // value is now accessible only inside the class
    public $fullname = False;
    public $givenname = False;
    public $familyname = False;
    public $room = False;

    function __construct($value){
        echo "Initializing constructor in Person: $value";

    }
    

    function get_name() {
        if ( $this->fullname !== False) return $this->fullname;
        if ( $this->familyname !== False && $this->givenname !== false){
            return $this->givenname. ' ' . $this->familyname;
        }
        return False;
    }

}

class sheldon extends Person{
    
    function personality(){
        if ($this->value == 5) return 'Sheldon Cooper is really a person';
        if ($this->value != 5) return 'Sheldon Cooper is not a person';
    }
}

$shivam = new Person();
$shivam->fullname = "Shivam Prasad";
$shivam->room = "4429NQ";

$colleen = new Person();
$colleen->familyname = 'Van Lent';
$colleen->givenname = 'Colleen';
$colleen->room = '102';

print $shivam->get_name(). "\n";
print $colleen->get_name(). "\n";

$new = new sheldon('es');
echo $new->personality()."\n";
echo $new->get_name()."\n";

// Note: protected  can be accessed in class and in derived classes. However, private 
// can just be accessed in the main class, not in derived classes



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


?>
