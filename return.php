<?php

// return returns program control to the calling module
// If called from within a function, the return statement immediately ends execution of the current function
// If called from the global scope, then execution of the current script file is ended

function data()
{
    return;
}
// var_dump(data()); // null


function data1(): void
{
    return;
}
// var_dump(data1()); // null

function data2(): void
{
    // return "somethig";
}
// var_dump(data2()); // Fatal error: A void function must not return a value

function truth()
{
    return true; // first return only returned , execution ends here...
    return 0; // int(0)
    return 1; // int(1)
}
// var_dump(truth()); // bool(true)



function greet($name) {
    echo 'Hello '.$name.'!';
    return [$name, strtoupper($name), strlen($name)];
    echo 'Bye '.$name.'!';
}
list($name, $capital_name, $name_length) = greet('Monty');
echo 'Your name is '.$name."<br>";
echo 'Your name is '.$capital_name."<br>";
echo 'Your name is '.$name_length."<br>";
/* 
Hello Monty! 
Your name is Monty. 
Your name is MONTY in capitals. 
Your name is 5 characters long.
*/


// return vs exit
// that return is a language construct and exist() is an in-built function in PHP.
// using return just exits the execution of the current script(ex : included files), exit the whole execution

// return;
include('ztest.php');
echo "somethingsss";