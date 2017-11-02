<?php

//filter_var() 通过使用一个指定的过滤器来过滤单一的变量
//filter_var_array() 通过相同或者不同的过滤器来过滤多个变量
//filter_input 获取一个输入变量，并对它进行过滤
//filter_input_array 获取多个输入变量，并通过相同或者不同的过滤器对他们进行过滤

$int = 123;
if (filter_var($int, FILTER_VALIDATE_INT)){
    echo "is int";
}else {
    echo "is not int";
}

//filter_has_var()检查是否存在指定输入类型的变量
if (filter_has_var(INPUT_GET, "name")){
    echo "input type exist";
}else {
    echo "input type is not exist";
}

//filter_input()函数从外部脚本获取输入，进行过滤
if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)){
    echo "is valid email";
}else {
    echo "is not valid email";
}

//filter_input_array()函数从外部脚本获取多项输入，并进行顾虑
$filters = array(
    "name" => array(
        "filter" => FILTER_CALLBACK,
        "flags" => FILTER_FORCE_ARRAY,
        "options" => "ucwords"
    ),
    "age" => array(
        "filter" => FILTER_VALIDATE_INT,
        "options" => array(
            "min_range" => 1,
            "max_range" => 120,
        ),
    ),
    "email" => FILTER_VALIDATE_EMAIL
)
print_r(filter_input_array(INPUT_POST, $filters));

















?>