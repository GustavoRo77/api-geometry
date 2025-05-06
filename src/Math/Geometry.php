<?php
 
namespace gustavopereira16\Math;
 
class Geometry
{
    /**
     * Calcula a área de um triângulo.
     * @return int|float
     */
    public function areaTriangulo(int|float $base, int|float $altura)
    {
        return ($base * $altura) / 2;
    }
 
     
        /**
         * Calcula a área de um retângulo.
         * @return int|float
         */
        public function areaRetangulo(int|float $base, int|float $altura)
        {
            return $base * $altura;
        }
    }