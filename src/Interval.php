<?php

namespace OzdemirBurak\Sancus;

/**
 * Binomial proportion confidence intervals
 * @author Burak Özdemir <mail@burakozdemir.co.uk>
 * @link http://burakozdemir.co.uk
 * @link https://github.com/ozdemirburak
 * @link https://en.wikipedia.org/wiki/Binomial_proportion_confidence_interval
 */
abstract class Interval
{
    /**
     * Count of positive results
     * @var
     */
    protected $positive;

    /**
     * Count of negative results
     * @var
     */
    protected $negative;

    /**
     * Level of confidence
     * @var
     */
    protected $confidence;

    /**
     * Count of total results
     * @var
     */
    protected $n;

    /**
     * Positive results out of total results
     * @var
     */
    protected $p;

    /**
     * Quantile of the standard normal distribution
     * @var
     */
    protected $z;

    /**
     * @param mixed $positive
     * @param mixed $negative
     * @param mixed $confidence
     */
    public function __construct($positive, $negative, $confidence = 0.95)
    {
        $this->positive = intval($positive);
        $this->negative = intval($negative);
        $this->confidence = floatval($confidence);
        $this->n = $this->positive + $this->negative;
        $this->z = $this->pnorm(1 - (1 - $this->confidence) / 2);
        $this->p = $this->n > 0 ? 1.0 * $this->positive / $this->n : null;
    }

    /**
     * @return float|int
     */
    abstract public function getUpperBound();

    /**
     * @return float|int
     */
    abstract public function getLowerBound();

    /**
     * @return array
     */
    public function getInterval()
    {
        return array(0 => $this->getLowerBound(), 1 => $this->getUpperBound());
    }

    /**
     * @link https://github.com/abscondment/statistics2/blob/master/lib/statistics2/base.rb#L89
     * @param $qn
     * @return float
     */
    protected function pnorm($qn)
    {
        $b = array(
            1.570796288, 0.03706987906, -0.8364353589e-3, -0.2250947176e-3,
            0.6841218299e-5, 0.5824238515e-5, -0.104527497e-5, 0.8360937017e-7,
            -0.3231081277e-8, 0.3657763036e-10, 0.6936233982e-12
        );

        if ($qn < 0.0 || $qn > 1.0 || $qn == 0.5) {
            return 0.0;
        }

        $w1 = $qn > 0.5 ? 1.0 - $qn : $qn;
        $w3 = - log(4.0 * $w1 * (1.0 - $w1));
        $w1 = $b[0];

        for ($i = 1; $i <= 10; $i++) {
            $w1 += $b[$i] * pow($w3, $i);
        }

        return $qn > 0.5 ? sqrt($w1 * $w3) : -sqrt($w1 * $w3);
    }
}
