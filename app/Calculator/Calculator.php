<?php 
namespace App\Calculator;

class Calculator 
{   
    /**
     * Store operations
     *
     * @var array
     */
    protected $operations = [];

    /**
     * Set operations
     *
     * @param OperationInterface $operation 
     * 
     * @return void
     */
    public function setOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    /**
     * Set multiple operations
     *
     * @param array $operations
     * 
     * @return void
     */
    public function setOperations(array $operations)
    {
        $operations = array_filter($operations, function($operation) {
            return $operation instanceof OperationInterface;
        });

        $this->operations = array_merge($this->operations, $operations);
    }

    /**
     * Get all operations
     *
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Calculate the result
     *
     * @return void
     */
    public function calculate()
    {
        if (count($this->operations) > 1) {

            return array_map(function($operation){
                
                return $operation->calculate();

            }, $this->operations);
        }

        return $this->operations[0]->calculate();
    }
}