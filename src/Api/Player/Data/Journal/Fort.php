<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Journal;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Data\Logs\FortSearchLogEntry;

class Fort extends Data {

    /**
     * @var integer
     */
    protected $timestampMs;

    /**
     * @var integer
     */
    protected $result;

    /**
     * @var string
     */
    protected $fortId;

    /**
     * @var integer
     */
    protected $eggs;

    /**
     * @var Item[]
     */
    protected $items;

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param FortSearchLogEntry $data
     * @return static
     */
    public static function create($data)
    {
        // Check if we retrieved valid data
        if ($data == null) {
            return;
        }

        $instance = new static();

        // Set the result status
        $instance->result = $data->getResult();

        // Set the fort id
        $instance->fortId = $data->getFortId();

        // Set the egg count
        $instance->eggs = $data->getEggs();

        foreach ($data->getItems() as $item) {
            // Add the item to the list of items
            $instance->items[] = Item::create($item);
        }

        return $instance;
    }

}