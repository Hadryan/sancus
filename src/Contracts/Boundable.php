<?php

namespace OzdemirBurak\Sancus\Contracts;

interface Boundable
{
    /**
     * A subset S of a partially ordered set P is called bounded below if there is an element k in P
     * such that k ≤ s for all s in S. The element k is called a lower bound of S.
     *
     * @return float|int
     */
    public function getLowerBound();

    /**
     * A subset S of a partially ordered set P is called bounded above if there is an element k in P
     * such that k ≥ s for all s in S. The element k is called an upper bound of S.
     *
     * @return float|int
     */
    public function getUpperBound();

    /**
     * Interval is a set of real numbers with the property that any number that lies between two numbers
     * in the set is also included in the set. For example, the set of all numbers x satisfying 0≤x≤1 is an
     * interval which contains 0 and 1, as well as all numbers between them.
     *
     * @return array
     */
    public function getInterval();
}
