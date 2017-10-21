<?php
/**
 * Created on 21.10.17 at 23:10.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;


/**
 * Class TrustlyAmount
 * @package Mymdz\Trustly
 */
class TrustlyAmount
{
    private $currency;
    protected $amount;

    /**
     * Following parameters will not be available for setting
     * for this package. If you need them please extend this class
     * and add setters
     */
    protected $suggestedMinAmount;
    protected $suggestedMaxAmount;

    public function __construct(string $currency, float $amount)
    {
        if (strlen($currency) <> 3) {
            throw new \InvalidArgumentException("Incorrect currency format. Currency format must be compatible with ISO 4217");
        }

        $this->currency = $currency;
        $this->amount = round($amount, 2);
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getSuggestedMinAmount()
    {
        return $this->suggestedMinAmount;
    }

    /**
     * @return mixed
     */
    public function getSuggestedMaxAmount()
    {
        return $this->suggestedMaxAmount;
    }

}