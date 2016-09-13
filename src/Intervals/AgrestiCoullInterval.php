<?php

namespace OzdemirBurak\Sancus\Intervals;

use OzdemirBurak\Sancus\Interval;

/**
 * Agresti-Coull (adjusted Wald) interval
 *
 * @link http://www.stat.ufl.edu/~aa/articles/agresti_coull_1998.pdf
 */
class AgrestiCoullInterval extends Interval
{
    /**
     * @return float|int
     */
    public function getLowerBound()
    {
        return $this->getN() ? $this->getP() - $this->calculate() : 0;
    }

    /**
     * @return float|int
     */
    public function getUpperBound()
    {
        return $this->getN() > 0 ? $this->getP() + $this->calculate() : 0;
    }

    /**
     * @return float
     */
    private function calculate()
    {
        return $this->z * sqrt($this->getP() * (1 - $this->getP()) / $this->getN());
    }

    /**
     * @return float
     */
    private function getP()
    {
        return ($this->positive + pow($this->z, 2) / 2) / $this->getN();
    }

    /**
     * @return float|int
     */
    private function getN()
    {
        return $this->n > 0 ? $this->n + pow($this->z, 2) : 0;
    }
}
