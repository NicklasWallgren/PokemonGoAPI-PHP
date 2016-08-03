<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use Exception;
use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonFamilyId;
use POGOProtos\Inventory\Candy;
use POGOProtos\Inventory\PokemonFamily;

/**
 * @method void setCandies(CandyItem[] $candies)
 * @method CandyItem[] getCandies()
 */
class CandyBank extends Data {

    /**
     * @var CandyItem[]
     */
    protected $candies = array();

    /**
     * @param Candy $data
     */
    public function add($data)
    {
        // Create a candy item from pokemon family data
        $candyItem = CandyItem::create($data);

        // Check if a candy item with the family id already exists
        if (array_key_exists($candyItem->getFamilyId(), $this->candies)) {
            // Retrieve the candy item
            $storedCandyItem = $this->candies[$candyItem->getFamilyId()];

            // Update the number of candy item
            $storedCandyItem->setCandy($storedCandyItem->getCandy() + $candyItem->getCandy());
        } else {
            $this->candies[$candyItem->getFamilyId()] = $candyItem;
        }
    }

    /**
     * Gets candy item by pokemon family id.
     *
     * @param integer $familyId
     * @return CandyItem
     * @throws Exception
     */
    public function get($familyId)
    {
        // Check if the provided family id is valid
        if (!PokemonFamilyId::isValid($familyId)) {
            throw new Exception(sprintf('Invalid pokemon family id provided. Pokemon family id \'%s\'', $familyId));
        }

        // Check if the candy bank contains the pokemon family id
        if (!array_key_exists($familyId, $this->candies)) {
            throw new Exception(sprintf('The candy bank does not contain candy for the pokemon family. Pokemon family id \'%s\'', $familyId));
        }

        return $this->candies[$familyId];
    }

}