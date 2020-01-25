<?php

namespace ABC\Test;  // 以下は名前空間「ABC\Test」

// trim()関数は定義されていないのでグローバル空間のものが呼ばれる
echo trim(' abc '), PHP_EOL;

// グローバル空間を明示して呼び出す
echo \trim(' abc '), PHP_EOL;
