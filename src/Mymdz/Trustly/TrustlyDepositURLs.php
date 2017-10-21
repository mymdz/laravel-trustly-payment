<?php
/**
 * Created on 21.10.17 at 23:19.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly;


/**
 * Class TrustlyURLs
 * @package Mymdz\Trustly
 */
class TrustlyDepositURLs
{
    private $notificationURL;
    private $successURL;
    private $failURL;

    /**
     * Following parameters are needed only in case if
     * you want your payment form to be hosted on trustly.com
     */
    private $templateURL;
    private $URLTarget;

    /**
     * TrustlyDepositURLs constructor.
     * @param $notificationURL
     * @param $successURL
     * @param $failURL
     */
    public function __construct($notificationURL, $successURL, $failURL)
    {
        $this->notificationURL = $notificationURL;
        $this->successURL = $successURL;
        $this->failURL = $failURL;
    }

    /**
     * @return mixed
     */
    public function getNotificationURL()
    {
        return $this->notificationURL;
    }

    /**
     * @return mixed
     */
    public function getSuccessURL()
    {
        return $this->successURL;
    }

    /**
     * @return mixed
     */
    public function getFailURL()
    {
        return $this->failURL;
    }

    /**
     * @return mixed
     */
    public function getTemplateURL()
    {
        return $this->templateURL;
    }

    /**
     * @param mixed $templateURL
     */
    public function setTemplateURL($templateURL)
    {
        $this->templateURL = $templateURL;
    }

    /**
     * @return mixed
     */
    public function getURLTarget()
    {
        return $this->URLTarget ?? "0";
    }

    /**
     * @param mixed $URLTarget
     */
    public function setURLTarget($URLTarget)
    {
        if (!in_array($URLTarget, ['_top', '_self', '_parent'])) {
            return false;
        }

        $this->URLTarget = $URLTarget;
        return true;
    }

}