<?php

namespace OzdemirBurak\Sancus\Tests;

use OzdemirBurak\Sancus\Intervals\WilsonInterval;

class WilsonIntervalTest extends \PHPUnit_Framework_TestCase
{
    public function testWhenPositiveCountIsZeroOutOfZero()
    {
        $this->assertFloatEquals(array(0, 0), new WilsonInterval(0, 0));
    }

    public function testWhenPositiveCountIsZeroOutOfTwentyFive()
    {
        $this->assertFloatEquals(array(0, 0.13319), new WilsonInterval(0, 25));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfTwentyFive()
    {
        $this->assertFloatEquals(array(0.86681, 1), new WilsonInterval(25, 0));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfFifty()
    {
        $this->assertFloatEquals(array(0.36645, 0.63355), new WilsonInterval(25, 25));
    }

    public function testScoreWhenPositiveCountIsTwentyFiveOutOfFifty()
    {
        return $this->assertEquals(0.36645, (new WilsonInterval(25, 25))->getScore(), '', pow(10, -5));
    }

    public function testWhenPositiveCountIsTwentyFiveOutOfFiftyWhereConfidenceIsNinetyPercentAsString()
    {
        $this->assertFloatEquals(array(0.38672, 0.61328), new WilsonInterval(25, 25, '0.90'));
    }

    public function testZeroConfidence()
    {
        $this->assertFloatEquals(array(0.5, 0.5), new WilsonInterval(25, 25, 0));
    }

    private function assertFloatEquals(array $expected, WilsonInterval $interval)
    {
        return $this->assertEquals($expected, $interval->getInterval(), '', pow(10, -5));
    }
}
