<?php

echo "<h3>PHP Callbacks / Callables</h3>";

// Callbacks can be denoted by the callable type declaration.
// Callback functions can not only be simple functions, but also object methods, including static class methods.
// Apart from common user-defined function, anonymous functions and arrow functions can also be passed to a callback parameter.
// Generally, any object implementing __invoke() can also be passed to a callback parameter.



function my_callback_function() {
    echo 'hello world!';
}
// Type 1: Simple callback
// call_user_func('my_callback_function'); // hello world!
// echo call_user_func(fn($movie)=>$movie, "kgf"); // kgf

// call_user_func(callable $callback, mixed ...$args): mixed
$movie_details = call_user_func(fn(...$movie): array => $movie, "kgf",230,"hyd","f-10"); // variable-length argument list
// print_r($movie_details); // Array ( [0] => kgf [1] => 230 [2] => hyd [3] => f-10 )



// An example callback method
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!';
    }
}

// Type 2: Static class method call
// call_user_func(array('MyClass', 'myCallbackMethod'));

// Type 3: Object method call
$obj = new MyClass();
// call_user_func(array($obj, 'myCallbackMethod'));

// Type 4: Static class method call
// call_user_func('MyClass::myCallbackMethod');



// Type 5: Objects implementing __invoke can be used as callables
// PHP will call the __invoke() magic method when you call an object as a function.
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";
    }
}
$c = new C();
// call_user_func($c, 'PHP!');





$data = function(){
    return __FUNCTION__;
};

function info(){
    return __FUNCTION__;
}

// is_callable — Verify that a value can be called as a function from the current scope.
// var_dump(is_callable(function(){})); // bool(true)

// Closure is a php in-built class to represent anonymous functions.
// Anonymous functions yield objects of this type. This class has methods that allow further control of the anonymous function after it has been created.
// a closure is a callable class

//Strictness because a closure is an object that has some additional methods: call(), bind() and bindto(). 
//They allow you to use a function declared outside of a class and execute it as if it was inside a class:

// --->  Closure must be an anonymous function. Whereas callable type can be anonymous and normal functions. <---

// echo $data(); // {closure}
// echo info(); // info
 
// var_dump(is_callable($data));  // bool(true)  because it's a callable function
// var_dump(is_callable(info()));   // bool(true)  because it's a callable function

// var_dump($data instanceof \Closure); // bool(true) -> anonymous functions are instance (or) object of \Closure class.
// var_dump(info() instanceof \Closure); // bool(false) 

// var_dump(function(){} instanceof \Closure); // bool(true)



// The difference is, that a Closure must be an anonymous function, where callable can also be a normal function.
// To type hint anonymous function use 'Closure' class as type hint.  -->  function example(\Closure $callback){}
// To type hint normal and anonymous functions use 'callable' compound datatype as type hint.  -->  function example(callable $callback){}

function exampleOne(\Closure $closure) {
    echo $closure();
}

function exampleTwo(callable $callback) {
    echo $callback();
}

$anonymousFun = function(){
    return __FUNCTION__;
};

function namedFun(){
    return __FUNCTION__;
}

// exampleOne($anonymousFun); // {closure}
// exampleTwo($anonymousFun); // {closure}

// exampleOne('namedFun'); // Argument #1 ($closure) must be of type Closure, string given,
// exampleTwo('namedFun'); // namedFun



function getFullName($firstname, callable $callback)
{
    return $callback($firstname);
}
$lastName = "Raj";
$fullName = getFullName('Pusha', function($fname) use ($lastName): string {
        return $fname." ".$lastName;
});
// echo $fullName;



// callback example with to convert name into upper & lower case letters

function personName(string $name, callable $callback){
    
    $result = [
        "upper" => strtoupper($name),
        "lower" => strtolower($name)
    ];

    if(is_callable($callback)){
        call_user_func($callback, $result);
    }
}

personName('NagaMaiAh', function(array $resultParts) {
    print_r($resultParts);
});
