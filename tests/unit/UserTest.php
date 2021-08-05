<?php 
use PHPUnit\Framework\TestCase;
use  App\Models\User;

class UserTest extends TestCase 
{
    protected $user;

    public function setUp():void
    {
        $this->user = new User;    
    }

    public function testThatWeCanGetTheFirstName()
    {
       
        $this->user->setFirstName("Hasinur");

        $this->assertEquals($this->user->getFirstName(), "Hasinur");
    }

    public function testThatWeCanGetLastName()
    {
        $this->user->setLastName("Rahman");

        $this->assertEquals($this->user->getLastName(), "Rahman");
    }

    public function testFullNameReturned()
    {
        $this->user->setFirstName("Hasinur");
        $this->user->setLastName("Rahman");

        $this->assertEquals($this->user->getFullName(), "Hasinur Rahman");
    }

    public function testFirstNameAndLastNareAreTrimed()
    {
        $this->user->setFirstName("  Hasinur  ");
        $this->user->setLastName("  Rahman  ");

        $this->assertEquals($this->user->getFirstName(), "Hasinur");
        $this->assertEquals($this->user->getLastName(), "Rahman");
    }

    public function testThatWeCanGetEmail()
    {
        $this->user->setEmail("hasinur@gmail.com");

        $this->assertEquals($this->user->getEmail(), "hasinur@gmail.com");
    }
}