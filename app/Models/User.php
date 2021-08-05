<?php 
namespace App\Models;
/**
 * Class User Model
 */
class User 
{   
    /**
     * Store first name
     *
     * @var string
     */
    protected $first_name;

    /**
     * Store last name
     *
     * @var string
     */
    protected $last_name;

    /**
     * Store email
     *
     * @var string
     */
    protected $email;

    /**
     * Set first name
     *
     * @param string $firstName User first name
     * 
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->first_name = trim($firstName);
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last name
     *
     * @param string $lastName Set user last name
     * 
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->last_name = trim($lastName);
    }

    /**
     * Get user last name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email Set user email
     * 
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get user full name
     *
     * @return void
     */
    public function getFullName()
    {
        return "$this->first_name $this->last_name";
    }
}