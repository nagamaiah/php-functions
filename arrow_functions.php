<?php

// Arrow functions were introduced in PHP 7.4 as a more concise syntax for anonymous functions.
// Updated or consice syntax for anonymous functions.
// Both anonymous functions and arrow functions are implemented using the Closure class.

// Basic Syntax  :  fn (argument_list) => expr.


fn(int $x) => $x; // the argument type must be (int)
fn(): int => $x; // type of return value (int)

$var = 10;
$int_fn = fn(int $x): int => $x;
// var_dump($int_fn($var)); // int(10)

// $data = function($value){
//     return $value;
// }

$data = fn(array $value): array => $value;
$list = ["one","two","three"];
print_r($data($list));



function getName($name,\Closure $callback){
    return $callback($name); // you are calling callback function here...
}
// echo getName('naga', fn($nm)=>$nm."maiah");


function getFullName(string $firstname, callable $callback)
{
    return $callback($firstname);
}
$lastName = "Raj";

// $fullName = getFullName('Pusha', function($fname) use ($lastName): string {
//         return $fname." ".$lastName;
// });

// with arrow functions you need not to pass global variable into function using use keyword
// arrow functions provides global variables within function
// Values from the outer scope cannot be modified by arrow functions

$fullName = getFullName('Pusha', fn(string $fname): string => $fname." ".$lastName);

echo $fullName;