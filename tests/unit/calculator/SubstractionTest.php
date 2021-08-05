<?php 
use PHPUnit\Framework\TestCase;
use App\Calculator\Substraction;
use App\Calculator\Exceptions\NoOperandsException;

class SubstractionTest extends TestCase 
{
    /** @test */
    public function can_substract_given_value()
    {
        $substraction = new Substraction;
        $substraction->setOperands([100, 50]);

        $this->assertEquals(50, $substraction->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandsException::class);

        $substraction = new Substraction;
        $substraction->calculate();
    }
}