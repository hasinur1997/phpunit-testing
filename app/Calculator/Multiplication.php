<?php 
namespace App\Calculator;
use App\Calculator\Exceptions\NoOperandsException;

/**
 * Class Multiplication
 */
class Multiplication extends OperationAbstract implements OperationInterface
{

   /**
     * Calculate the operands
     *
     * @return Number
     */
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }
        
        return array_product($this->operands);
       
    }
}