<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setSendMarketingEmails(int $sendMarketingEmails)
 * @method void setSendPushNotifications(int $sendPushNotifications)
 *
 * @method integer getSendMarketingEmails()
 * @method integer getSendPushNotifications()
 */
class ContactSettings extends Data {

    /**
     * @var integer
     */
    protected $sendMarketingEmails;

    /**
     * @var integer
     */
    protected $sendPushNotifications;

}