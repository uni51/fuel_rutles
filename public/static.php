<?php

class MyClass
{
    public static $static = 0;
    public $var = 0;

    public static function increment()
    {
        static::$static++;
    }
}

$obj1 = new MyClass();
$obj2 = new MyClass();

MyClass::$static++;
$obj1->var++;
$obj2->increment();

echo MyClass::$static, '<br>'; // 2
echo $obj1->var, '<br>';       // 1
echo $obj2->var, '<br>';       // 0

MyClass::increment();
$obj1->increment();
$obj2->var++;

echo MyClass::$static, '<br>'; // 4
echo $obj1->var, '<br>';       // 1
echo $obj2->var, '<br>';       // 1
