<?php

echo "<h3>PHP Function Arguments</h3>";

// FUNCTION ARGUMENTS
// We can pass the information in PHP function through arguments which is separated by comma
// PHP supports passing arguments
// 1. Call by Value that means a copy of the value of the variable used in it from the outer scope.. Won't effect original value
// 2. Call by Reference means move or cut of a value. Will effect original value.
// 3. Default argument values
// 4. Named Arguments
// 5. Variable-length argument list


function process(int $one,$two,float $three,$four = 5.5,$five)
    {
        // echo func_num_args();
        return [$one,$two,$three,$four,$five];
    }
    $result = process(2,true,2.2,4.4,[3,'tet',false],45);
    echo "<pre>";
    // print_r($result);
    // var_dump($result);


// Passing function parameters by reference
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
// echo $str;    // outputs 'This is a string, and something extra.'


// Variable-length argument list
// PHP has support for variable-length argument lists in user-defined functions by using the ... token.
// The arguments will be passed into the given variable as an array:

    function maxValue(...$list)
    {
        // echo func_num_args(); //7
        // print_r($list);
        // return max($list);
        // return min($list);
        
    }
    $max = maxValue(-1,0,2,4,5,6,4,8,9);
    $min = maxValue(-1,0,2,4,5,6,4,8,9);
    // echo $min; // -1
    // echo $max; // 9
    

// ... can also be used when calling functions to unpack an array or Traversable variable or literal into the argument list:

    function add($a, $b) {
        return $a + $b;
    }

    // echo add(...[1, 2, 3])."\n";

    $a = [1, 2, 5, 6];
    // echo add(...$a);





// FUNCTION ARGUMENT FUNCTIONS -> In php older versions

// func_num_args(): int  -- Returns the number of arguments passed to the function
    // function test123()
    // {
    //     echo func_num_args(); // 9
    // }
    // test123(3,3,3,4,4,5,5,'nag',[3,5]);


// func_get_arg(int $position): mixed  -- Return an item from the argument list
// This function may be used in conjunction with func_get_args() and func_num_args() to allow user-defined functions 
// to accept variable-length argument lists.
// The argument offset. Function arguments are counted starting from zero.
// Returns the specified argument, or false on error.

    function test1234()
    {
        $argCount = func_num_args();
        $lastIndex = $argCount - 1;
        echo $argCount; //9
        echo $lastIndex; //8
        // echo func_get_arg(3); // 4
        // echo func_get_arg(0); // 3
        print_r(func_get_arg($argCount - 1));  // [3,5]
    }
    // test1234(3,3,3,4,4,5,5,'nag',[3,5]);


    //Calculate the average of the numbers given
    function avg(){
        $sum = 0;
        for($i = 0; $i < func_num_args(); $i++){
            $sum += func_get_arg($i);
        }
        $avg = $sum / func_num_args();
        return $avg;
    }
    // echo sprintf("%.2f",avg(2,1,2,1,3,4,5,1,3,6));


// func_get_args(): array -- Returns an array comprising a function's argument list
    function test12345()
    {
        $argList = func_get_args();
        print_r($argList);
    }
    // test12345(3,3,3,4,4,5,5,'nag',[3,5]);


?>