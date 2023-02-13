<?php

// Anonymous functions (or) lambda functions, also known as closures, allow the creation of functions which have no specified name.
// Anonymous functions are implemented using the Closure class.
// Closures can also be used as the values of variables; PHP automatically converts such expressions into instances of the Closure internal class. 
// Anonymous functions should end with semicolon (;)

// Closures may also inherit variables from the parent scope. Any such variables must be passed to the use language construct.
$message = 'Array values avg is : ';
$example = function (array $values) use ($message): string|int {
    $avg = array_sum($values)/count($values);
    return $message.$avg;
};

$data = [3,4,5.5,6,7,8];
// echo $example($data);

// Return type declaration comes after the use clause
// $example = function () use ($message): string {
//     return "hello $message";
// };

function getFullName($firstname, \Closure $callback)
{
    $delimiter = "-";
    return call_user_func($callback,$firstname,$delimiter);
}

$msg = "Your fullname is : ";
$lastName = "Raj";
$fullName = getFullName('Pusha', function($fname, $deli) use ($msg, $lastName): string {
        $args = [$msg, $fname, $deli, $lastName];
        return implode(" ", $args);
});
echo $fullName;





?>