<?php

namespace ABC\Test;  // 以下は名前空間「ABC\Test」
function foo() {
    echo '名前空間「ABC\Test」のfoo()', PHP_EOL;
}

namespace XYZ\Test;  // 以下は名前空間「XYZ\Test」
function foo() {
    echo '名前空間「XYZ\Test」のfoo()', PHP_EOL;
}

// XYZ\Test\foo()を呼び出す
foo();

// ABC\Test\foo()を呼び出す
\ABC\Test\foo();
