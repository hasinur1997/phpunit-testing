<?php 
use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;
use App\Calculator\Division;
use App\Calculator\Calculator;

/**
 * Class CalculatorTest
 */
class CalculatorTest extends TestCase 
{
    /** @test */
    public function can_set_single_operation()
    {
        $addition = new Addition;
        $addition->setOperands([10, 50]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);
        
        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_set_multiple_operation()
    {
        $addition1 = new Addition();
        $addition1->setOperands([10, 30, 40]);

        $addition2 = new Addition;
        $addition2->setOperands([120, 23, 50]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operations_are_ignored_if_not_instance_of_operation_interface()
    {
        $addition = new Addition();
        $addition->setOperands([10, 30, 40]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition, 'cat', 'dog']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_calculate_result()
    {
        $addition = new Addition;
        $addition->setOperands([10, 5]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);
        
        $this->assertEquals(15, $calculator->calculate());
    }

    /** @test */
    public function calculate_method_returns_multiple_results()
    {
        $addition = new Addition();
        $addition->setOperands([10, 5]); // 15

        $division = new Division;
        $division->setOperands([50, 2]); // 25

        $calculator = new Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());

        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(25, $calculator->calculate()[1]);
    }
}