<?php

namespace OzdemirBurak\Sancus\Tests;

use OzdemirBurak\Sancus\Intervals\WaldInterval;

class WaldIntervalTest extends \PHPUnit_Framework_TestCase
{
    public function testWhenPositiveCountIsZeroOutOfZero()
    {
        $this->assertFloatEquals(array(0 => 0, 1 => 0), new WaldInterval(0, 0));
    }

    public function testWhenPositiveCountIsZeroOutOfTwentyFive()
    {
        $this->assertFloatEquals(array(0 => 0, 1 => 0), new WaldInterval(0, 25));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfTwentyFive()
    {
        $this->assertFloatEquals(array(0 => 1, 1 => 1), new WaldInterval(25, 0));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfFifty()
    {
        $this->assertFloatEquals(array(0 => 0.36141, 1 => 0.63859), new WaldInterval(25, 25));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfFiftyWhereConfidenceIsNinetyPercentAsString()
    {
        $this->assertFloatEquals(array(0 => 0.38369, 1 => 0.61631), new WaldInterval(25, 25, "0.90"));
    }

    private function assertFloatEquals(array $expected, WaldInterval $interval)
    {
        return $this->assertEquals($expected, $interval->getInterval(), '', pow(10, -5));
    }
}
