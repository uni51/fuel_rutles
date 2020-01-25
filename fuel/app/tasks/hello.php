<?php

namespace Fuel\Tasks;

class Hello
{
    public function run($name = 'World')
    {
        echo 'Hello '.$name.'!'.PHP_EOL;
    }
}