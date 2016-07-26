<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setNextCollectedTimestampMs(int $nextCollectedTimestampMs)
 * @method void setNextDefenderBonusCollectTimestampMs(int $nextDefenderBonusCollectTimestampMs)
 *
 * @method integer getNextCollectedTimestampMs()
 * @method integer getNextDefenderBonusCollectTimestampMs()
 */
class DailyBonus extends Data {

    /**
     * @var int
     */
    protected $nextCollectedTimestampMs;

    /**
     * @var int
     */
    protected $nextDefenderBonusCollectTimestampMs;

}