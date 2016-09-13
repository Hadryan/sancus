<?php

namespace OzdemirBurak\Sancus\Intervals;

use OzdemirBurak\Sancus\Interval;

/**
 * Wilson Score interval
 *
 * @link http://www.med.mcgill.ca/epidemiology/hanley/tmp/proportion/wilson_jasa_1927.pdf
 * @link http://www.evanmiller.org/how-not-to-sort-by-average-rating.html
 * @link http://www.redditblog.com/2009/10/reddits-new-comment-sorting-system.html
 */
class WilsonInterval extends Interval
{
    /**
     * @return float|int
     */
    public function getLowerBound()
    {
        return $this->n > 0 ? $this->multiplier() * ($this->innerLeft() - $this->innerRight()) : 0;
    }

    /**
     * @return float|int
     */
    public function getUpperBound()
    {
        return $this->n > 0 ? $this->multiplier() * ($this->innerLeft() + $this->innerRight()) : 0;
    }

    /**
     * @return float|int
     */
    public function getScore()
    {
        return $this->getLowerBound();
    }

    /**
     * @return float
     */
    private function multiplier()
    {
        return 1 / (1 + (pow($this->z, 2) / $this->n));
    }

    /**
     * @return float
     */
    private function innerLeft()
    {
        return $this->p + (pow($this->z, 2) / (2 * $this->n));
    }

    /**
     * @return float
     */
    private function innerRight()
    {
        return $this->z * sqrt(($this->p * (1 - $this->p) / $this->n) + (pow($this->z, 2) / (4 * pow($this->n, 2))));
    }
}
