<?php

namespace NicklasW\PkmGoApi\Api\Map\Data\Resources;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Enums\TeamColor;
use POGOProtos\Map\Fort\FortRenderingType;
use POGOProtos\Map\Fort\FortSponsor;
use POGOProtos\Map\Fort\FortType;

class Fort extends Data {

    /**
     * @var string
     */
    protected $id = "";

    /**
     * @var int
     */
    protected $lastModifiedTimestampMs = 0;

    /**
     * @var int
     */
    protected $latitude = 0;

    /**
     * @var int
     */
    protected $longitude = 0;

    /**
     * @var bool
     */
    protected $enabled = false;

    /**
     * @var
     */
    protected $type = FortType::GYM;

    /**
     * @var
     */
    protected $ownedByTeam = TeamColor::NEUTRAL;

    /**
     * @var
     */
    protected $guardPokemonId = PokemonId::MISSINGNO;

    /**
     * @var int
     */
    protected $guardPokemonCp = 0;

    /**
     * @var int
     */
    protected $gymPoints = 0;

    /**
     * @var bool
     */
    protected $isInBattle = false;

    /**
     * @var int
     */
    protected $cooldownCompleteTimestampMs = 0;

    /**
     * @var
     */
    protected $sponsor = FortSponsor::UNSET_SPONSOR;

    /**
     * @var
     */
    protected $renderingType = FortRenderingType::DEFAULT;

    /**
     * @var string
     */
    protected $activeFortModifier = "";

    /**
     * @var null
     */
    protected $lureInfo = null;

}