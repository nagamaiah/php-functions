<?php

// Anonymous functions (or) lambda functions, also known as closures, allow the creation of functions which have no specified name.
// Anonymous functions are implemented using the Closure class.
// Closures can also be used as the values of variables; PHP automatically converts such expressions into instances of the Closure internal class. 
// Anonymous functions should end with semicolon (;)

// Closures may also inherit variables from the parent scope. Any such variables must be passed to the use language construct.
$message = 'hello';
$example = function () use ($message) {
    var_dump($message);
};

$example();

// Return type declaration comes after the use clause
// $example = function () use ($message): string {
//     return "hello $message";
// };


function getFullName($firstname, \Closure $callback)
{
    return $callback($firstname);
}
$lastName = "Raj";
$fullName = getFullName('Pusha', function($fname) use ($lastName): string {
        return $fname." ".$lastName;
});
echo $fullName;





?>