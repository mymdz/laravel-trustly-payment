<?php
/**
 * Created on 22.10.17 at 22:03.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly\Notifications;


/**
 * Class TrustlyNotification
 * @package Mymdz\Trustly
 */
abstract class TrustlyNotification
{
    protected $notification;

    protected $api;

    /**
     * TrustlyNotification constructor.
     * @param $notification
     */
    public function __construct(\Trustly_Api_Signed $api, \Trustly_Data_JSONRPCNotificationRequest $notification)
    {
        $this->api = $api;
        $this->notification = $api->handleNotification($notification);
    }

    public function prepareResponse(bool $success = true)
    {
        return $this->api->notificationResponse($this->notification, $success)->json();
    }

    public function getMethod()
    {
        return $this->notification->getMethod();
    }

    public function getData($name = null)
    {
        return $this->notification->getData($name);
    }

    public function getOrderID()
    {
        return $this->getData('orderid');
    }

    public function getNotificationID()
    {
        return $this->getData('notificationid');
    }

    public function getMessageID()
    {
        return $this->getData('messageid');
    }

    public function getUserID()
    {
        return $this->getData('enduserid');
    }

    public function getRawNotification()
    {
        return $this->notification->notification_body;
    }

}