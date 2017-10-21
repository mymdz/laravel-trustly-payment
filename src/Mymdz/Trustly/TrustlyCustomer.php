<?php
/**
 * Created on 21.10.17 at 19:38.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;

/**
 * Class TrustlyCustomer
 * @package Mymdz\Trustly
 */
class TrustlyCustomer
{

    /**
     * Required parameters
     */
    private $firstName;
    private $lastName;
    private $email;
    private $identifier;

    /**
     * Optional parameters
     */
    private $mobilePhone = null;
    private $nationalIDNumber = null;
    private $ip = null;

    public function __construct($identifier, $firstName, $lastName, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->identifier = $identifier;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return mixed
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @return mixed
     */
    public function getNationalIDNumber()
    {
        return $this->nationalIDNumber;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @param mixed $mobilePhone
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @param null $nationalIDNumber
     */
    public function setNationalIDNumber($nationalIDNumber)
    {
        $this->nationalIDNumber = $nationalIDNumber;
    }

    /**
     * @param null $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
}