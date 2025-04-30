<?php
namespace Geometria\Math;

class Geometry
{
    /**
     * @return int|float
     */
    public function Tria(int|float $base, int|float $altura)
    {
        return $base * $altura / 2;

    }
    /**
     * @return int|float
     */
    public function Reta(int|float $base, int|float $altura)

    {
        return $base * $altura;
    }
    
}