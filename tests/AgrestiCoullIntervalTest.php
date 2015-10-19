<?php

namespace OzdemirBurak\Sancus\Tests;

use OzdemirBurak\Sancus\Intervals\AgrestiCoullInterval;

class AgrestiCoullIntervalTest extends \PHPUnit_Framework_TestCase
{
    public function testWhenPositiveCountIsZeroOutOfZero()
    {
        $this->assertFloatEquals(array(0 => 0, 1 => 0), new AgrestiCoullInterval(0, 0));
    }

    public function testWhenPositiveCountIsZeroOutOfTwentyFive()
    {
        $this->assertFloatEquals(array(0 => -0.02439, 1 => 0.15759), new AgrestiCoullInterval(0, 25));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfTwentyFive()
    {
        $this->assertFloatEquals(array(0 => 0.84241, 1 => 1.02439), new AgrestiCoullInterval(25, 0));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfFifty()
    {
        $this->assertFloatEquals(array(0 => 0.36645, 1 => 0.63355), new AgrestiCoullInterval(25, 25));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfFiftyWhereConfidenceIsNinetyPercentAsString()
    {
        $this->assertFloatEquals(array(0 => 0.38672, 1 => 0.61328), new AgrestiCoullInterval(25, 25, "0.90"));
    }

    private function assertFloatEquals(array $expected, AgrestiCoullInterval $interval)
    {
        return $this->assertEquals($expected, $interval->getInterval(), '', pow(10, -5));
    }
}
