<?php
/**
 * Created on 22.10.17 at 00:49.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;

use Mymdz\Trustly\Contracts\TrustlyContract;
use Mymdz\Trustly\Notifications\CancelNotification;
use Mymdz\Trustly\Notifications\CreditNotification;
use Mymdz\Trustly\Notifications\DebitNotification;
use Mymdz\Trustly\Notifications\PendingNotification;
use Mymdz\Trustly\Notifications\TrustlyNotification;

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

    /**
     * @param TrustlyDeposit $deposit
     * @param TrustlyAmount $amount
     * @param TrustlyCustomer $customer
     * @param TrustlyDepositURLs $urls
     * @param TrustlyAddress|null $address
     * @return mixed
     */
    public function deposit(TrustlyDeposit $deposit, TrustlyAmount $amount, TrustlyCustomer $customer, TrustlyDepositURLs $urls, TrustlyAddress $address = null)
    {
        $api = $this->getSignedAPI();
        return $deposit->call($api, $amount, $customer, $urls, $address);
    }

    /**
     * @param int $trustlyOrderID
     * @param TrustlyAmount $amount
     * @return bool
     */
    public function refund(int $trustlyOrderID, TrustlyAmount $amount)
    {
        $api = $this->getSignedAPI();

        $numSeparator = setlocale(LC_NUMERIC, null);
        setlocale(LC_NUMERIC, '.');

        $refundResult = $api->refund($trustlyOrderID, $amount->getAmount(), $amount->getCurrency());

        setlocale(LC_NUMERIC, $numSeparator);

        return $refundResult->getData('result') == 1;
    }

    /**
     * @param $notification
     * @return TrustlyNotification|null
     */
    public function parseNotification($notification)
    {
        $api = $this->getSignedAPI();

        if (is_array($notification)) {
            $notification = json_encode($notification);
        }

        $notification = $api->handleNotification($notification);

        /**
         * You should catch exceptions here and abort(400)
         */
        $concreteNotification = null;
        switch ($notification->getMethod()):
            case 'credit':
                $concreteNotification = new CreditNotification($api, $notification);
                break;
            case 'debit':
                $concreteNotification = new DebitNotification($api, $notification);
                break;
            case 'pending':
                $concreteNotification = new PendingNotification($api, $notification);
                break;
            case 'cancel':
                $concreteNotification = new CancelNotification($api, $notification);
                break;
            default:
                throw new \InvalidArgumentException('Unsupported notification method');

        endswitch;

        return $concreteNotification;
    }
}