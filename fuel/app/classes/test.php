<?php
/**
 * イベントのテスト
 */

class Test
{
    public static function event_tset($arg1, $arg2)
    {
        Log::info('イベントのテスト：'.$arg2[0].', '. $arg2[1].__METHOD__);
    }
}