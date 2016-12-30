<?php
/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Api\Pokemon\Data;

use NicklasW\PkmGoApi\Api\Support\Enums\PokemonMove as PokemonMoveEnumSupport;
use POGOProtos\Enums\PokemonMove as PokemonMoveEnum;

class PokemonMove
{
    /** @var array|int[]|PokemonMoveEnum[] */
    protected $moves;

    /**
     * PokemonMove constructor.
     *
     * @param array|int[]|PokemonMoveEnum[] $moves
     */
    public function __construct(array $moves)
    {
        $this->moves = $moves;
    }

    /**
     * Get the moves (raw).
     *
     * @return array|\int[]|PokemonMoveEnum[]
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * Get the moves as names.
     *
     * @return string[]
     */
    public function getMovesStrings()
    {
        return array_map(function ($move) {
            return PokemonMoveEnumSupport::name($move);
        }, $this->getMoves());
    }
}
