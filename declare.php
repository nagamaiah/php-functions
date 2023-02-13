<?php
declare(strict_types=1);

echo "<h3>PHP Strict Typing (since php7 version)</h3>";

//The declare construct is used to set execution directives for a block of code.
// 
// Three Types of directives
// 1. declare(ticks=1);
// 2. declare(encoding='ISO-8859-1');
// 3. declare(strict_types=1);

// To enable strict mode, the declare statement is used with the strict_types declaration:
// declare(strict_types = 1);
// strict_types declaration must be the very first statement in the script

// PHP 7 we now have added Scalar types. Specifically: int, float, string, and bool.
// With scalar type hinting and strict types enabled , we can write correct and self-documenting PHP programs.
// It also gives you more control over your code and can make the code easier to read.

// By default, scalar type-declarations are non-strict, which means they will attempt to change 
// the original type to match the type specified by the type-declaration.

// It is possible to enable strict mode on a per-file basis. In strict mode, only a variable of exact 
// type of the type declaration will be accepted, or a TypeError will be thrown

// The only exception to this rule is that an integer may be given to a function expecting a float.
    function test(float $price)
    {
        return $price;
    }
    // echo test(5.5); // 5.5
    // echo test('5.5'); // TypeError with stric_types enabled
    // echo test(25); // 25  -> This will work with with stric_types enabled, you can pass int value to float type declaration

    function example(int $price)
    {
        return $price;
    }
    // echo example(34); // 34
    // echo example(2.5); // TypeError with stric_types enabled
    // echo example('25'); // TypeError with stric_types enabled



// Type hint expected return values 

function get_quantity(): int {
    return '100 apples';
}
// echo get_quantity(); // TypeError: get_quantity(): Return value must be of type int, string returned

function getStatus(): bool {
    return 1;
}
// echo getStatus(); // Uncaught TypeError: getStatus(): Return value must be of type bool, int returned


?>