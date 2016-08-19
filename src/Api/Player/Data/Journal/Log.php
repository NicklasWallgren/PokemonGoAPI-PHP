<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Journal;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Data\Logs\ActionLogEntry;

class Log extends Data
{

    /**
     * @var Fort[]
     */
    protected $forts = array();

    /**
     * @var Pokemon[]
     */
    protected $pokemons = array();

    /**
     * @return Fort[]
     */
    public function getForts()
    {
        return $this->forts;
    }

    /**
     * @return Pokemon[]
     */
    public function getPokemons()
    {
        return $this->pokemons;
    }

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param ActionLogEntry[] $data
     * @return static
     */
    public static function create($data)
    {
        $instance = new static();

        // Check if we retrieved valid data
        if ($data == null) {
            return $instance;
        }

        foreach ($data as $logEntry) {
            if ($logEntry->hasCatchPokemon()) {
                $element = Pokemon::create($logEntry->getCatchPokemon());
                $element->setTimestampMs($logEntry->getTimestampMs());

                // Adds pokemon to the list of pokemon log entries
                $instance->pokemons[] = $element;
            } elseif ($logEntry->hasFortSearch()) {
                $element = Fort::create($logEntry->getFortSearch());;
                $element->setTimestampMs($logEntry->getTimestampMs());

                // Add fort to the list of fort log entries
                $instance->forts[] = $element;
            }
        }

        return $instance;
    }


}