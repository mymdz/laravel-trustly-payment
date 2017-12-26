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
use Mymdz\Trustly\TrustlyDeposit;

/**
 * Interface TrustlyContract
 * @package Mymdz\Trustly\Contracts
 */
interface TrustlyContract
{
    public function deposit(TrustlyDeposit $deposit, TrustlyAmount $amount, TrustlyCustomer $customer, TrustlyDepositURLs $urls, TrustlyAddress $address = null);
    public function refund(int $trustlyOrderID, TrustlyAmount $amount);
    public function parseNotification($notification);
    public function accountLedger(\Carbon\Carbon $fromDate, \Carbon\Carbon $toDate, string $currency = null);
}