<?php

namespace OzdemirBurak\Sancus\Intervals;

use OzdemirBurak\Sancus\Interval;

/**
 * Wald (Asymptotic) method based on a normal approximation
 * @link https://projecteuclid.org/download/pdf_1/euclid.aoms/1177732209
 */
class WaldInterval extends Interval
{
    /**
     * @return float|int
     */
    public function getLowerBound()
    {
        return $this->n > 0 ? $this->p - $this->calculate() : 0;
    }

    /**
     * @return float|int
     */
    public function getUpperBound()
    {
        return $this->n > 0 ? $this->p + $this->calculate() : 0;
    }

    /**
     * @return float
     */
    private function calculate()
    {
        return $this->z * sqrt($this->p * (1 - $this->p) / $this->n);
    }
}
