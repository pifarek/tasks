<?php

namespace App;

class Generator
{
    /**
     * Generates a random alpha-numeric string
     * @param int $max
     * @return string
     */
    public function random($max = 10)
    {
        return str_random($max);
    }
}