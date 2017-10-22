<?php
/**
 * Created on 23.10.17 at 00:17.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly\Notifications;

/**
 * Class CreditNotification
 * @package Mymdz\Trustly\Notifications
 */
class CreditNotification extends TrustlyNotification
{
    public function getAmount()
    {
        return $this->getData('amount');
    }

    public function getCurrencyISO()
    {
        return $this->getData('currency');
    }
}