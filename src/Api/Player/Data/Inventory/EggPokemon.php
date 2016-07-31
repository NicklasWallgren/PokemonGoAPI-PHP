<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setId(long $id)
 * @method void setEggKmWalkedTarget(double $eggKmWalkedTarget)
 * @method void setCapturedCellId(long $capturedCellId)
 * @method void setCreationTimeMs(long $creationTimeMs)
 * @method void setEggIncubatorId(string $eggIncubatorId)

 * @method long getId()
 * @method double getEggKmWalkedTarget()
 * @method long getCapturedCellId()
 * @method long getCreationTimeMs()
 * @method string getEggIncubatorId()
 */
class EggPokemon extends Data {

    /**
     * @var long
     */
    protected $id;

    /**
     * @var double
     */
    protected $eggKmWalkedTarget;

    /**
     * @var long
     */
    protected $capturedCellId;

    /**
     * @var long
     */
    protected $creationTimeMs;

    /**
     * @var string
     */
    protected $eggIncubatorId;

}