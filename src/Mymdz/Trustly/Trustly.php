<?php
/**
 * Created on 22.10.17 at 00:49.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;

use Mymdz\Trustly\Contracts\TrustlyContract;

/**
 * Class Trustly
 * @package Mymdz\Trustly
 */
class Trustly implements TrustlyContract
{

    private $account;
    private $password;
    private $privateKey;
    private $sandbox;

    /**
     * Trustly constructor.
     * @param $account
     * @param $password
     * @param $privateKey
     * @param $sandbox
     */
    public function __construct($account, $password, $privateKey, $sandbox)
    {
        $this->account = $account;
        $this->password = $password;
        $this->privateKey = $privateKey;
        $this->sandbox = $sandbox;
    }


    private function getTrustlyDomain()
    {
        return $this->sandbox ? 'test.trustly.com' : 'trustly.com';
    }

    private function getSignedAPI() : \Trustly_Api_Signed
    {
        return new \Trustly_Api_Signed(
            $this->privateKey,
            $this->account,
            $this->password,
            $this->getTrustlyDomain()
        );
    }

    private function getUnsignedAPI() : \Trustly_Api_Unsigned
    {
        return new \Trustly_Api_Unsigned(
            $this->account,
            $this->password,
            $this->getTrustlyDomain()
        );
    }

    public function deposit(TrustlyAmount $amount, TrustlyCustomer $customer, TrustlyDepositURLs $urls, TrustlyAddress $address = null)
    {

    }
}