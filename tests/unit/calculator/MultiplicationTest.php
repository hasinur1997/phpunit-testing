<?php 
use PHPUnit\Framework\TestCase;
use App\Calculator\Multiplication;
use App\Calculator\Exceptions\NoOperandsException;

class MultiplicationTest extends TestCase 
{
    /** @test */
    public function can_multiply_given_operands()
    {
        $multiplication = new Multiplication;
        $multiplication->setOperands([5, 5]);

        $this->assertEquals(25, $multiplication->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandsException::class);

        $addition = new Multiplication;
        $addition->calculate();
    }
}