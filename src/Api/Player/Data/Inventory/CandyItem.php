<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonFamilyId;

/**
 * @method void setFamilyId(integer $familyId)
 * @method void setCandy(integer $candy)
 * @method integer getFamilyId()
 * @method integer getCandy()
 */
class CandyItem extends Data {

    /**
     * @var integer
     */
    protected $familyId = PokemonFamilyId::FAMILY_NONE;

    /**
     * @var integer
     */
    protected $candy = 0;

    /**
     * Returns the number of candies.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->candy;
    }

}