<?php
namespace App\Calculator;

/**
 * Class OperationAbstract
 */
abstract class OperationAbstract 
{
    /**
     * Store operands
     *
     * @var array
     */
    protected $operands = [];

    /**
     * Set operands
     *
     * @param array $operands Items of numbers that have to be calculated
     * 
     * @return void
     */
    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}