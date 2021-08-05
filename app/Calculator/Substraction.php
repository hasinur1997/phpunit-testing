<?php 
namespace App\Calculator;
use App\Calculator\Exceptions\NoOperandsException;

/**
 * Class Multiplication
 */
class Substraction extends OperationAbstract implements OperationInterface
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
        
        $result = $this->operands[0];

        for ($i = 1;  $i < count($this->operands); $i++) {
            $result -= $this->operands[$i];
        }

        return $result;
       
    }
}