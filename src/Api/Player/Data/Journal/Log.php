<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Journal;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Data\Logs\ActionLogEntry;

class Log extends Data {

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
        // Check if we retrieved valid data
        if ($data == null) {
            return;
        }

        $instance = new static();

        foreach ($data as $logEntry) {
            if ($logEntry->hasCatchPokemon()) {
                // Adds pokemon to the list of pokemon log entries
                $instance->pokemons[] = Pokemon::create($logEntry->getCatchPokemon());
            } elseif ($logEntry->hasFortSearch()) {
                // Add fort to the list of fort log entries
                $instance->forts[] = Fort::create($logEntry->getFortSearch());
            }
        }

        return $instance;
    }


}