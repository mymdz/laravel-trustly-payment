<?php
/**
 * Created on 22.10.17 at 00:40.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly\Contracts;

use Mymdz\Trustly\TrustlyAmount;
use Mymdz\Trustly\TrustlyCustomer;
use Mymdz\Trustly\TrustlyDepositURLs;
use Mymdz\Trustly\TrustlyAddress;

/**
 * Interface TrustlyContract
 * @package Mymdz\Trustly\Contracts
 */
interface TrustlyContract
{
    public function deposit(TrustlyAmount $amount, TrustlyCustomer $customer, TrustlyDepositURLs $urls, TrustlyAddress $address = null);
}