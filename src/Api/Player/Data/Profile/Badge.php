<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setBadgeType(int $badgeType)
 * @method void setLevel(int $level)
 * @method void setNextEquipChangeAllowedTimestampMs(int $nextEquipChangeAllowedTimestampMs)
 *
 * @method integer getBadgeType()
 * @method integer getLevel()
 * @method integer getNextEquipChangeAllowedTimestampMs()
 */
class Badge extends Data {

    /**
     * @var integer
     */
    protected $badgeType;
    /**
     * @var array
     */
    protected $level;

    /**
     * @var integer
     */
    protected $nextEquipChangeAllowedTimestampMs;

}