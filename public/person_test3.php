<?php

require __DIR__ . '/person.php';

class Person_Test3 extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provider_人データ
     */
    public function test_設定した性別は取得した性別と一致する($name, $gender, $birthdate)
    {
        $person = new Person($name, $gender, $birthdate);

        $test = $person->get_gender();
        $expected = $gender;

        $this->assertEquals($expected, $test);
    }

    public function provider_人データ()
    {
        return array(
            array('Rintaro', 'male',   '1991/12/14'),
            array('Mayuri',  'female', '1994/2/1'),
            array('Suzuha',  'female', '2017/9/27'),
        );
    }
}