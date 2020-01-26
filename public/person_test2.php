<?php

require __DIR__ . '/person.php';

class Person_Test2 extends \PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function setUp(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function test_男性の場合は性別を取得するとmaleである()
    {
        fwrite(STDOUT, __METHOD__ . "\n");

        $person = new Person('Rintaro', 'male', '1991/12/14');

        $test = $person->get_gender();
        $expected = 'male';

        $this->assertEquals($expected, $test);
    }

    public function test_女性の場合は性別を取得するとfemaleである()
    {
        fwrite(STDOUT, __METHOD__ . "\n");

        $person = new Person('Mayuri', 'female', '1994/2/1');

        $test = $person->get_gender();
        $expected = 'female';

        $this->assertEquals($expected, $test);
    }

    protected function tearDown(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
}