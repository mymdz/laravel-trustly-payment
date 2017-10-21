<?php
/**
 * Created on 21.10.17 at 23:34.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;


/**
 * Class TrustlyDeposit
 * @package Mymdz\Trustly
 */
class TrustlyDeposit
{
    private $messageID;
    private $transactionComment;
    private $locale;
    private $country;

    /**
     * TrustlyDeposit constructor.
     * @param $messageID
     * @param $transactionComment
     * @param $locale
     * @param $country
     */
    public function __construct($messageID, $transactionComment, $locale, $country)
    {
        $this->messageID = $messageID;
        $this->transactionComment = $transactionComment;
        $this->locale = $locale;
        $this->country = $country;
    }

    public function call(\Trustly_Api_Signed $api, TrustlyAmount $amount, TrustlyCustomer $customer, TrustlyDepositURLs $urls, TrustlyAddress $address = null)
    {
        if ($address == null) {
            $address = new TrustlyAddress();
        }

        $deposit = $api->deposit(
            $urls->getNotificationURL(),
            $customer->getIdentifier(),
            $this->messageID,
            $this->locale,
            $amount->getAmount(),
            $amount->getCurrency(),
            $this->country,
            $customer->getMobilePhone(),
            $customer->getFirstName(),
            $customer->getLastName(),
            $customer->getNationalIDNumber(),
            $this->transactionComment,
            $customer->getIp(),
            $urls->getSuccessURL(),
            $urls->getFailURL(),
            $urls->getTemplateURL(),
            $urls->getURLTarget(),
            $amount->getSuggestedMinAmount(),
            $amount->getSuggestedMaxAmount(),
            "PHP Trustly Facade mymdz/laravel-trustly-payment",
            false,
            $customer->getEmail(),
            $address->getCountry(),
            $address->getPostalCode(),
            $address->getCity(),
            $address->getAddressLine1(),
            $address->getAddressLine2(),
            $address->getShippingAddress(),
            null
        );

        return $deposit->getData('url');
    }

}