<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;

use POGOProtos\Inventory\EggIncubator as EggIncubatorData;
use POGOProtos\Inventory\EggIncubators as EggIncubatorsData;

/**
 * @method void setEggIncubators(EggIncubator[] $eggIncubators)
 * @method EggIncubator[] getEggIncubators()
 */
class EggIncubators extends Data {

    /**
     * @var EggIncubator[]
     */
    protected $eggIncubators = array();

    /**
     * @param EggIncubatorData $eggIncubator
     */
    public function add($eggIncubator)
    {
        // Add the egg incubator to the list of egg incubators
        $this->eggIncubators[] = EggIncubator::create($eggIncubator);
    }

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param EggIncubatorsData $data
     * @return static
     */
    public static function create($data)
    {
        // Create a instance
        $instance = new static();

        // Iterate through the list of egg incubators
        foreach ($data->getEggIncubator() as $eggIncubator) {
            // Add a egg incubator to the list of egg incubators
            $instance->add($eggIncubator);
        }

        return $instance;
    }


}