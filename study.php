<?php
$a_bool = TRUE;   // a boolean
$a_str  = "foo";  // a string
$a_str2 = 'foo';  // a string
$an_int = 12;     // an integer

echo gettype($a_bool); // prints out:  boolean
echo gettype($a_str);  // prints out:  string

// If this is an integer, increment it by four
if (is_int($an_int)) {
    $an_int += 4;
}

// If $a_bool is a string, print it out
// (does not print out anything)
if (is_string($a_bool)) {
    echo "String: $a_bool";
}

$str = <<<Mex
Example of string
spanning multiple lines
using heredoc syntax.\n<br/>
Mex;

echo $str."<br/>";
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
    3 => "f",
         "e",
);
var_dump($array);

list($last) = $array;
echo "last+".$last."<br/>";

echo key($array)."<br/>";
next($array);
echo key($array)."<br/>";
end($array);rsort($array);
echo key($array)."<br/>";

$binary = (binary) $string;
$binary = b"0df";
echo (boolean)$binary;
$a = &$b;
$b="test";
echo $a;

function test(){
	echo $GLOBALS['a'];
}
test();
echo (int)"b";
$obj = 0;
function t($obj){
   $obj++;
}
t($obj);
echo $obj;


class Foo{
	function bar(){
		$name =  "ba";
		$this->$name();
	}
	function ba(){
			echo "<br/>222";
	}
}
$foo = new Foo();
$test= "bar";
$foo->$test();

class Penguin {

  public function __construct($name) {
      $this->species = 'Penguin';
      $this->name = $name;
  }

  public function __toString() {
      return "test to_String";
  }
}

$peng = new Penguin();
echo $peng; // prints test to_String

?>