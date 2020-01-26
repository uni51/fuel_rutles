<?php

require __DIR__ . '/hello.php';

function assertTrue($conditioon)
{
    if(!$conditioon){
        throw new Exception('Assertion failed.');
    }
}

$test = hello();
$expected = 'Hello World!';
assertTrue($test===$expected);