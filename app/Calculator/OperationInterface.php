<?php
namespace App\Calculator;

/**
 * Operation Interface
 */
interface OperationInterface 
{
    /**
     * Calculate the value
     *
     * @return number
     */
    public function calculate();
}