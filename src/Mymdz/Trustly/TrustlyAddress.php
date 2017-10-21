<?php
/**
 * Created on 21.10.17 at 22:58.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;

/**
 * Class TrustlyAddress
 * @package Mymdz\Trustly
 */
class TrustlyAddress
{
    private $country;
    private $postalCode;
    private $city;
    private $addressLine1;
    private $addressLine2;
    private $shippingAddress = null;
    
    public function __construct($country = null, $postalCode = null, $city = null, $line1 = null, $line2 = null)
    {
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->addressLine1 = $line1;
        $this->addressLine2 = $line2;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $addressLine1
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * @param mixed $addressLine2
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @param mixed $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }
}