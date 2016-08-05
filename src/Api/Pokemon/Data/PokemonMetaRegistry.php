<?php

namespace NicklasW\PkmGoApi\Api\Pokemon\Data;

use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMove as PokemonMoveData;
use POGOProtos\Enums\PokemonFamilyId;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Enums\PokemonMove;
use POGOProtos\Enums\PokemonType;

class PokemonMetaRegistry {

    /**
     * @var PokemonMeta[] The list of pokemon meta data
     */
    public static $POKEMON_META = array();

    /**
     * Returns the pokemon meta data by pokemon id.
     *
     * @param integer $pokemonId
     * @return PokemonMeta
     */
    public static function getByPokemonId($pokemonId)
    {
        return self::$POKEMON_META[$pokemonId];
    }

    /**
     * Initialize the pokemon meta registry.
     */
    public static function initialize()
    {
        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0001_POKEMON_BULBASAUR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_BULBASAUR);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.7);
        $pokemonMeta->setHeightStdDev(0.0875);
        $pokemonMeta->setBaseStamina(90);
        $pokemonMeta->setCylRadiusM(0.3815);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(126);
        $pokemonMeta->setDiskRadiusM(0.5723);
        $pokemonMeta->setCollisionRadiusM(0.3815);
        $pokemonMeta->setPokedexWeightKg(6.9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.2725);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.15);
        $pokemonMeta->setModelScale(1.09);
        $pokemonMeta->setUniqueId("V0001_POKEMON_BULBASAUR");
        $pokemonMeta->setBaseDefense(126);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.8625);
        $pokemonMeta->setCylHeightM(0.763);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.654);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::VINE_WHIP_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::SEED_BOMB,
            PokemonMove::POWER_WHIP,
        )));
        $pokemonMeta->setNumber(1);
        self::$POKEMON_META[PokemonId::BULBASAUR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0002_POKEMON_IVYSAUR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_BULBASAUR);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.51);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(156);
        $pokemonMeta->setDiskRadiusM(0.765);
        $pokemonMeta->setCollisionRadiusM(0.31875);
        $pokemonMeta->setPokedexWeightKg(13);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.255);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1.5);
        $pokemonMeta->setModelScale(0.85);
        $pokemonMeta->setUniqueId("V0002_POKEMON_IVYSAUR");
        $pokemonMeta->setBaseDefense(158);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(1.625);
        $pokemonMeta->setCylHeightM(1.0625);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.6375);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::BULBASAUR);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::VINE_WHIP_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::POWER_WHIP,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(2);
        self::$POKEMON_META[PokemonId::IVYSAUR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0003_POKEMON_VENUSAUR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_BULBASAUR);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(2);
        $pokemonMeta->setHeightStdDev(0.25);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.759);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(198);
        $pokemonMeta->setDiskRadiusM(1.1385);
        $pokemonMeta->setCollisionRadiusM(0.759);
        $pokemonMeta->setPokedexWeightKg(100);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.3795);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.69);
        $pokemonMeta->setUniqueId("V0003_POKEMON_VENUSAUR");
        $pokemonMeta->setBaseDefense(200);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(12.5);
        $pokemonMeta->setCylHeightM(1.2075);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.035);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.04);
        $pokemonMeta->setParentId(PokemonId::IVYSAUR);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::VINE_WHIP_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::PETAL_BLIZZARD,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(3);
        self::$POKEMON_META[PokemonId::VENUSAUR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0004_POKEMON_CHARMANDER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CHARMANDER);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(78);
        $pokemonMeta->setCylRadiusM(0.3125);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(128);
        $pokemonMeta->setDiskRadiusM(0.4688);
        $pokemonMeta->setCollisionRadiusM(0.15625);
        $pokemonMeta->setPokedexWeightKg(8.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.15625);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.25);
        $pokemonMeta->setUniqueId("V0004_POKEMON_CHARMANDER");
        $pokemonMeta->setBaseDefense(108);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(1.0625);
        $pokemonMeta->setCylHeightM(0.75);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.46875);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SCRATCH_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAME_CHARGE,
            PokemonMove::FLAME_BURST,
            PokemonMove::FLAMETHROWER,
        )));
        $pokemonMeta->setNumber(4);
        self::$POKEMON_META[PokemonId::CHARMANDER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0005_POKEMON_CHARMELEON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CHARMANDER);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(116);
        $pokemonMeta->setCylRadiusM(0.4635);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(160);
        $pokemonMeta->setDiskRadiusM(0.6953);
        $pokemonMeta->setCollisionRadiusM(0.2575);
        $pokemonMeta->setPokedexWeightKg(19);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.23175);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.03);
        $pokemonMeta->setUniqueId("V0005_POKEMON_CHARMELEON");
        $pokemonMeta->setBaseDefense(140);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(2.375);
        $pokemonMeta->setCylHeightM(1.133);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.7725);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::CHARMANDER);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SCRATCH_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FIRE_PUNCH,
            PokemonMove::FLAME_BURST,
            PokemonMove::FLAMETHROWER,
        )));
        $pokemonMeta->setNumber(5);
        self::$POKEMON_META[PokemonId::CHARMELEON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0006_POKEMON_CHARIZARD");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CHARMANDER);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.7);
        $pokemonMeta->setHeightStdDev(0.2125);
        $pokemonMeta->setBaseStamina(156);
        $pokemonMeta->setCylRadiusM(0.81);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(212);
        $pokemonMeta->setDiskRadiusM(1.215);
        $pokemonMeta->setCollisionRadiusM(0.405);
        $pokemonMeta->setPokedexWeightKg(90.5);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.2025);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.81);
        $pokemonMeta->setUniqueId("V0006_POKEMON_CHARIZARD");
        $pokemonMeta->setBaseDefense(182);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(11.3125);
        $pokemonMeta->setCylHeightM(1.377);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.0125);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.04);
        $pokemonMeta->setParentId(PokemonId::CHARMELEON);
        $pokemonMeta->setCylGroundM(0.405);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WING_ATTACK_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DRAGON_CLAW,
            PokemonMove::FLAMETHROWER,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(6);
        self::$POKEMON_META[PokemonId::CHARIZARD] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0007_POKEMON_SQUIRTLE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SQUIRTLE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(88);
        $pokemonMeta->setCylRadiusM(0.3825);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(112);
        $pokemonMeta->setDiskRadiusM(0.5738);
        $pokemonMeta->setCollisionRadiusM(0.2295);
        $pokemonMeta->setPokedexWeightKg(9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.19125);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.53);
        $pokemonMeta->setUniqueId("V0007_POKEMON_SQUIRTLE");
        $pokemonMeta->setBaseDefense(142);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(1.125);
        $pokemonMeta->setCylHeightM(0.64259988);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.3825);
        $pokemonMeta->setShoulderModeScale(0.1);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::TACKLE_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::AQUA_TAIL,
            PokemonMove::WATER_PULSE,
            PokemonMove::AQUA_JET,
        )));
        $pokemonMeta->setNumber(7);
        self::$POKEMON_META[PokemonId::SQUIRTLE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0008_POKEMON_WARTORTLE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SQUIRTLE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(118);
        $pokemonMeta->setCylRadiusM(0.375);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(144);
        $pokemonMeta->setDiskRadiusM(0.5625);
        $pokemonMeta->setCollisionRadiusM(0.25);
        $pokemonMeta->setPokedexWeightKg(22.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.1875);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0008_POKEMON_WARTORTLE");
        $pokemonMeta->setBaseDefense(176);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(2.8125);
        $pokemonMeta->setCylHeightM(1);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.625);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::SQUIRTLE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICE_BEAM,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::AQUA_JET,
        )));
        $pokemonMeta->setNumber(8);
        self::$POKEMON_META[PokemonId::WARTORTLE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0009_POKEMON_BLASTOISE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SQUIRTLE);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(158);
        $pokemonMeta->setCylRadiusM(0.564);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(186);
        $pokemonMeta->setDiskRadiusM(0.846);
        $pokemonMeta->setCollisionRadiusM(0.564);
        $pokemonMeta->setPokedexWeightKg(85.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.282);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.94);
        $pokemonMeta->setUniqueId("V0009_POKEMON_BLASTOISE");
        $pokemonMeta->setBaseDefense(222);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(10.6875);
        $pokemonMeta->setCylHeightM(1.2925);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.175);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.04);
        $pokemonMeta->setParentId(PokemonId::WARTORTLE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICE_BEAM,
            PokemonMove::FLASH_CANNON,
            PokemonMove::HYDRO_PUMP,
        )));
        $pokemonMeta->setNumber(9);
        self::$POKEMON_META[PokemonId::BLASTOISE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0010_POKEMON_CATERPIE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CATERPIE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(90);
        $pokemonMeta->setCylRadiusM(0.306);
        $pokemonMeta->setBaseFleeRate(0.2);
        $pokemonMeta->setBaseAttack(62);
        $pokemonMeta->setDiskRadiusM(0.459);
        $pokemonMeta->setCollisionRadiusM(0.102);
        $pokemonMeta->setPokedexWeightKg(2.9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.153);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(0);
        $pokemonMeta->setModelScale(2.04);
        $pokemonMeta->setUniqueId("V0010_POKEMON_CATERPIE");
        $pokemonMeta->setBaseDefense(66);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.3625);
        $pokemonMeta->setCylHeightM(0.408);
        $pokemonMeta->setCandyToEvolve(12);
        $pokemonMeta->setCollisionHeightM(0.306);
        $pokemonMeta->setShoulderModeScale(0);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BITE_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STRUGGLE,
        )));
        $pokemonMeta->setNumber(10);
        self::$POKEMON_META[PokemonId::CATERPIE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0011_POKEMON_METAPOD");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CATERPIE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.7);
        $pokemonMeta->setHeightStdDev(0.0875);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.351);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(56);
        $pokemonMeta->setDiskRadiusM(0.5265);
        $pokemonMeta->setCollisionRadiusM(0.117);
        $pokemonMeta->setPokedexWeightKg(9.9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.1755);
        $pokemonMeta->setMovementTimerS(3600);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.17);
        $pokemonMeta->setUniqueId("V0011_POKEMON_METAPOD");
        $pokemonMeta->setBaseDefense(86);
        $pokemonMeta->setAttackTimerS(3600);
        $pokemonMeta->setWeightStdDev(1.2375);
        $pokemonMeta->setCylHeightM(0.6435);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.6435);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::CATERPIE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BITE_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STRUGGLE,
        )));
        $pokemonMeta->setNumber(11);
        self::$POKEMON_META[PokemonId::METAPOD] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0012_POKEMON_BUTTERFREE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CATERPIE);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.666);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(144);
        $pokemonMeta->setDiskRadiusM(0.999);
        $pokemonMeta->setCollisionRadiusM(0.1665);
        $pokemonMeta->setPokedexWeightKg(32);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.1776);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.11);
        $pokemonMeta->setUniqueId("V0012_POKEMON_BUTTERFREE");
        $pokemonMeta->setBaseDefense(144);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(4);
        $pokemonMeta->setCylHeightM(1.11);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.555);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::METAPOD);
        $pokemonMeta->setCylGroundM(0.555);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::BUG_BITE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BUZZ,
            PokemonMove::PSYCHIC,
            PokemonMove::SIGNAL_BEAM,
        )));
        $pokemonMeta->setNumber(12);
        self::$POKEMON_META[PokemonId::BUTTERFREE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0013_POKEMON_WEEDLE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_WEEDLE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.209);
        $pokemonMeta->setBaseFleeRate(0.2);
        $pokemonMeta->setBaseAttack(68);
        $pokemonMeta->setDiskRadiusM(0.3135);
        $pokemonMeta->setCollisionRadiusM(0.1045);
        $pokemonMeta->setPokedexWeightKg(3.2);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.15675);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(2.09);
        $pokemonMeta->setUniqueId("V0013_POKEMON_WEEDLE");
        $pokemonMeta->setBaseDefense(64);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.4);
        $pokemonMeta->setCylHeightM(0.418);
        $pokemonMeta->setCandyToEvolve(12);
        $pokemonMeta->setCollisionHeightM(0.209);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_STING_FAST,
            PokemonMove::BUG_BITE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STRUGGLE,
        )));
        $pokemonMeta->setNumber(13);
        self::$POKEMON_META[PokemonId::WEEDLE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0014_POKEMON_KAKUNA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_WEEDLE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(90);
        $pokemonMeta->setCylRadiusM(0.25);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(62);
        $pokemonMeta->setDiskRadiusM(0.375);
        $pokemonMeta->setCollisionRadiusM(0.25);
        $pokemonMeta->setPokedexWeightKg(10);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.125);
        $pokemonMeta->setMovementTimerS(3600);
        $pokemonMeta->setJumpTimeS(0);
        $pokemonMeta->setModelScale(1.25);
        $pokemonMeta->setUniqueId("V0014_POKEMON_KAKUNA");
        $pokemonMeta->setBaseDefense(82);
        $pokemonMeta->setAttackTimerS(3600);
        $pokemonMeta->setWeightStdDev(1.25);
        $pokemonMeta->setCylHeightM(0.75);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.75);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::WEEDLE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_STING_FAST,
            PokemonMove::BUG_BITE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STRUGGLE,
        )));
        $pokemonMeta->setNumber(14);
        self::$POKEMON_META[PokemonId::KAKUNA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0015_POKEMON_BEEDRILL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_WEEDLE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.462);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(144);
        $pokemonMeta->setDiskRadiusM(0.693);
        $pokemonMeta->setCollisionRadiusM(0.308);
        $pokemonMeta->setPokedexWeightKg(29.5);
        $pokemonMeta->setMovementType(MovementType::ELECTRIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.231);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.77);
        $pokemonMeta->setUniqueId("V0015_POKEMON_BEEDRILL");
        $pokemonMeta->setBaseDefense(130);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(3.6875);
        $pokemonMeta->setCylHeightM(0.77);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.5775);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::KAKUNA);
        $pokemonMeta->setCylGroundM(0.385);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BITE_FAST,
            PokemonMove::POISON_JAB_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::AERIAL_ACE,
            PokemonMove::X_SCISSOR,
        )));
        $pokemonMeta->setNumber(15);
        self::$POKEMON_META[PokemonId::BEEDRILL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0016_POKEMON_PIDGEY");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PIDGEY);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.252);
        $pokemonMeta->setBaseFleeRate(0.2);
        $pokemonMeta->setBaseAttack(94);
        $pokemonMeta->setDiskRadiusM(0.378);
        $pokemonMeta->setCollisionRadiusM(0.1344);
        $pokemonMeta->setPokedexWeightKg(1.8);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.126);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.4);
        $pokemonMeta->setModelScale(1.68);
        $pokemonMeta->setUniqueId("V0016_POKEMON_PIDGEY");
        $pokemonMeta->setBaseDefense(90);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.225);
        $pokemonMeta->setCylHeightM(0.504);
        $pokemonMeta->setCandyToEvolve(12);
        $pokemonMeta->setCollisionHeightM(0.252);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::TACKLE_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::TWISTER,
            PokemonMove::AERIAL_ACE,
            PokemonMove::AIR_CUTTER,
        )));
        $pokemonMeta->setNumber(16);
        self::$POKEMON_META[PokemonId::PIDGEY] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0017_POKEMON_PIDGEOTTO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PIDGEY);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(126);
        $pokemonMeta->setCylRadiusM(0.474);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(126);
        $pokemonMeta->setDiskRadiusM(0.711);
        $pokemonMeta->setCollisionRadiusM(0.316);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.237);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.79);
        $pokemonMeta->setUniqueId("V0017_POKEMON_PIDGEOTTO");
        $pokemonMeta->setBaseDefense(122);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(0.9875);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.69125);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::PIDGEY);
        $pokemonMeta->setCylGroundM(0.395);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::STEEL_WING_FAST,
            PokemonMove::WING_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::TWISTER,
            PokemonMove::AERIAL_ACE,
            PokemonMove::AIR_CUTTER,
        )));
        $pokemonMeta->setNumber(17);
        self::$POKEMON_META[PokemonId::PIDGEOTTO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0018_POKEMON_PIDGEOT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PIDGEY);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(166);
        $pokemonMeta->setCylRadiusM(0.864);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(170);
        $pokemonMeta->setDiskRadiusM(1.296);
        $pokemonMeta->setCollisionRadiusM(0.36);
        $pokemonMeta->setPokedexWeightKg(39.5);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.216);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.72);
        $pokemonMeta->setUniqueId("V0018_POKEMON_PIDGEOT");
        $pokemonMeta->setBaseDefense(166);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(4.9375);
        $pokemonMeta->setCylHeightM(1.44);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.008);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::PIDGEOTTO);
        $pokemonMeta->setCylGroundM(0.36);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::STEEL_WING_FAST,
            PokemonMove::WING_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::HURRICANE,
            PokemonMove::AERIAL_ACE,
            PokemonMove::AIR_CUTTER,
        )));
        $pokemonMeta->setNumber(18);
        self::$POKEMON_META[PokemonId::PIDGEOT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0019_POKEMON_RATTATA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_RATTATA);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.252);
        $pokemonMeta->setBaseFleeRate(0.2);
        $pokemonMeta->setBaseAttack(92);
        $pokemonMeta->setDiskRadiusM(0.378);
        $pokemonMeta->setCollisionRadiusM(0.189);
        $pokemonMeta->setPokedexWeightKg(3.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.126);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(0.9);
        $pokemonMeta->setModelScale(1.26);
        $pokemonMeta->setUniqueId("V0019_POKEMON_RATTATA");
        $pokemonMeta->setBaseDefense(86);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.4375);
        $pokemonMeta->setCylHeightM(0.378);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.252);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::QUICK_ATTACK_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::BODY_SLAM,
            PokemonMove::HYPER_FANG,
        )));
        $pokemonMeta->setNumber(19);
        self::$POKEMON_META[PokemonId::RATTATA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0020_POKEMON_RATICATE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_RATTATA);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.7);
        $pokemonMeta->setHeightStdDev(0.0875);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.5265);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(146);
        $pokemonMeta->setDiskRadiusM(0.7898);
        $pokemonMeta->setCollisionRadiusM(0.2925);
        $pokemonMeta->setPokedexWeightKg(18.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.26325);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.17);
        $pokemonMeta->setUniqueId("V0020_POKEMON_RATICATE");
        $pokemonMeta->setBaseDefense(150);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(2.3125);
        $pokemonMeta->setCylHeightM(0.936);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.585);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::RATTATA);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::HYPER_BEAM,
            PokemonMove::HYPER_FANG,
        )));
        $pokemonMeta->setNumber(20);
        self::$POKEMON_META[PokemonId::RATICATE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0021_POKEMON_SPEAROW");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SPEAROW);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.296);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(102);
        $pokemonMeta->setDiskRadiusM(0.444);
        $pokemonMeta->setCollisionRadiusM(0.148);
        $pokemonMeta->setPokedexWeightKg(2);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.148);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.48);
        $pokemonMeta->setUniqueId("V0021_POKEMON_SPEAROW");
        $pokemonMeta->setBaseDefense(78);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.25);
        $pokemonMeta->setCylHeightM(0.518);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.2664);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::QUICK_ATTACK_FAST,
            PokemonMove::PECK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::TWISTER,
            PokemonMove::AERIAL_ACE,
            PokemonMove::DRILL_PECK,
        )));
        $pokemonMeta->setNumber(21);
        self::$POKEMON_META[PokemonId::SPEAROW] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0022_POKEMON_FEAROW");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SPEAROW);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.504);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(168);
        $pokemonMeta->setDiskRadiusM(1.26);
        $pokemonMeta->setCollisionRadiusM(0.252);
        $pokemonMeta->setPokedexWeightKg(38);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.126);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.84);
        $pokemonMeta->setUniqueId("V0022_POKEMON_FEAROW");
        $pokemonMeta->setBaseDefense(146);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(4.75);
        $pokemonMeta->setCylHeightM(1.05);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.63);
        $pokemonMeta->setShoulderModeScale(0.375);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::SPEAROW);
        $pokemonMeta->setCylGroundM(0.42);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::STEEL_WING_FAST,
            PokemonMove::PECK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::TWISTER,
            PokemonMove::AERIAL_ACE,
            PokemonMove::DRILL_RUN,
        )));
        $pokemonMeta->setNumber(22);
        self::$POKEMON_META[PokemonId::FEAROW] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0023_POKEMON_EKANS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EKANS);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(2);
        $pokemonMeta->setHeightStdDev(0.25);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.4325);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(112);
        $pokemonMeta->setDiskRadiusM(0.6488);
        $pokemonMeta->setCollisionRadiusM(0.2595);
        $pokemonMeta->setPokedexWeightKg(6.9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.1384);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.73);
        $pokemonMeta->setUniqueId("V0023_POKEMON_EKANS");
        $pokemonMeta->setBaseDefense(112);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(0.8625);
        $pokemonMeta->setCylHeightM(0.6055);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.346);
        $pokemonMeta->setShoulderModeScale(0.375);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_STING_FAST,
            PokemonMove::ACID_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::WRAP,
            PokemonMove::GUNK_SHOT,
        )));
        $pokemonMeta->setNumber(23);
        self::$POKEMON_META[PokemonId::EKANS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0024_POKEMON_ARBOK");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EKANS);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(3.5);
        $pokemonMeta->setHeightStdDev(0.4375);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.615);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(166);
        $pokemonMeta->setDiskRadiusM(0.9225);
        $pokemonMeta->setCollisionRadiusM(0.41);
        $pokemonMeta->setPokedexWeightKg(65);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.164);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.82);
        $pokemonMeta->setUniqueId("V0024_POKEMON_ARBOK");
        $pokemonMeta->setBaseDefense(166);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(8.125);
        $pokemonMeta->setCylHeightM(1.353);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.353);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::EKANS);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::ACID_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DARK_PULSE,
            PokemonMove::GUNK_SHOT,
            PokemonMove::SLUDGE_WAVE,
        )));
        $pokemonMeta->setNumber(24);
        self::$POKEMON_META[PokemonId::ARBOK] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0025_POKEMON_PIKACHU");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PIKACHU);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.37);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(124);
        $pokemonMeta->setDiskRadiusM(0.555);
        $pokemonMeta->setCollisionRadiusM(0.185);
        $pokemonMeta->setPokedexWeightKg(6);
        $pokemonMeta->setMovementType(MovementType::NORMAL);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.185);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.48);
        $pokemonMeta->setUniqueId("V0025_POKEMON_PIKACHU");
        $pokemonMeta->setBaseDefense(108);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.75);
        $pokemonMeta->setCylHeightM(0.74);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.518);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::QUICK_ATTACK_FAST,
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER,
            PokemonMove::THUNDERBOLT,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(25);
        self::$POKEMON_META[PokemonId::PIKACHU] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0026_POKEMON_RAICHU");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PIKACHU);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.486);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(200);
        $pokemonMeta->setDiskRadiusM(0.729);
        $pokemonMeta->setCollisionRadiusM(0.27);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.216);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.08);
        $pokemonMeta->setUniqueId("V0026_POKEMON_RAICHU");
        $pokemonMeta->setBaseDefense(154);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(1.35);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.54);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::PIKACHU);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SPARK_FAST,
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER_PUNCH,
            PokemonMove::THUNDER,
            PokemonMove::BRICK_BREAK,
        )));
        $pokemonMeta->setNumber(26);
        self::$POKEMON_META[PokemonId::RAICHU] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0027_POKEMON_SANDSHREW");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SANDSHREW);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.3225);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(90);
        $pokemonMeta->setDiskRadiusM(0.4838);
        $pokemonMeta->setCollisionRadiusM(0.258);
        $pokemonMeta->setPokedexWeightKg(12);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.1935);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.29);
        $pokemonMeta->setUniqueId("V0027_POKEMON_SANDSHREW");
        $pokemonMeta->setBaseDefense(114);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(1.5);
        $pokemonMeta->setCylHeightM(0.774);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.48375);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::SCRATCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::ROCK_SLIDE,
            PokemonMove::ROCK_TOMB,
        )));
        $pokemonMeta->setNumber(27);
        self::$POKEMON_META[PokemonId::SANDSHREW] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0028_POKEMON_SANDSLASH");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SANDSHREW);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(150);
        $pokemonMeta->setCylRadiusM(0.4);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(150);
        $pokemonMeta->setDiskRadiusM(0.6);
        $pokemonMeta->setCollisionRadiusM(0.35);
        $pokemonMeta->setPokedexWeightKg(29.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.35);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0028_POKEMON_SANDSLASH");
        $pokemonMeta->setBaseDefense(172);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(3.6875);
        $pokemonMeta->setCylHeightM(1);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.9);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::SANDSHREW);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::METAL_CLAW_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BULLDOZE,
            PokemonMove::EARTHQUAKE,
            PokemonMove::ROCK_TOMB,
        )));
        $pokemonMeta->setNumber(28);
        self::$POKEMON_META[PokemonId::SANDSLASH] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0029_POKEMON_NIDORAN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_NIDORAN_FEMALE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.37);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(100);
        $pokemonMeta->setDiskRadiusM(0.555);
        $pokemonMeta->setCollisionRadiusM(0.185);
        $pokemonMeta->setPokedexWeightKg(7);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.185);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.48);
        $pokemonMeta->setUniqueId("V0029_POKEMON_NIDORAN");
        $pokemonMeta->setBaseDefense(104);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(0.875);
        $pokemonMeta->setCylHeightM(0.666);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.37);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::POISON_STING_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POISON_FANG,
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(29);
        self::$POKEMON_META[PokemonId::NIDORAN_FEMALE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0030_POKEMON_NIDORINA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_NIDORAN_FEMALE);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(140);
        $pokemonMeta->setCylRadiusM(0.4388);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(132);
        $pokemonMeta->setDiskRadiusM(0.6581);
        $pokemonMeta->setCollisionRadiusM(0.2925);
        $pokemonMeta->setPokedexWeightKg(20);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.1755);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.17);
        $pokemonMeta->setUniqueId("V0030_POKEMON_NIDORINA");
        $pokemonMeta->setBaseDefense(136);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(2.5);
        $pokemonMeta->setCylHeightM(0.87749988);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.585);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::NIDORAN_FEMALE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::POISON_STING_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POISON_FANG,
            PokemonMove::DIG,
            PokemonMove::SLUDGE_BOMB,
        )));
        $pokemonMeta->setNumber(30);
        self::$POKEMON_META[PokemonId::NIDORINA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0031_POKEMON_NIDOQUEEN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_NIDORAN_FEMALE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.4095);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(184);
        $pokemonMeta->setDiskRadiusM(0.6143);
        $pokemonMeta->setCollisionRadiusM(0.455);
        $pokemonMeta->setPokedexWeightKg(60);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.2275);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.91);
        $pokemonMeta->setUniqueId("V0031_POKEMON_NIDOQUEEN");
        $pokemonMeta->setBaseDefense(190);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(7.5);
        $pokemonMeta->setCylHeightM(1.183);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.79625);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::NIDORINA);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::POISON_JAB_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STONE_EDGE,
            PokemonMove::EARTHQUAKE,
            PokemonMove::SLUDGE_WAVE,
        )));
        $pokemonMeta->setNumber(31);
        self::$POKEMON_META[PokemonId::NIDOQUEEN] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0032_POKEMON_NIDORAN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_NIDORAN_MALE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(92);
        $pokemonMeta->setCylRadiusM(0.4725);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(110);
        $pokemonMeta->setDiskRadiusM(0.7088);
        $pokemonMeta->setCollisionRadiusM(0.252);
        $pokemonMeta->setPokedexWeightKg(9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.1575);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.26);
        $pokemonMeta->setUniqueId("V0032_POKEMON_NIDORAN");
        $pokemonMeta->setBaseDefense(94);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(1.125);
        $pokemonMeta->setCylHeightM(0.756);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.315);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_STING_FAST,
            PokemonMove::PECK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::HORN_ATTACK,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(32);
        self::$POKEMON_META[PokemonId::NIDORAN_MALE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0033_POKEMON_NIDORINO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_NIDORAN_MALE);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.9);
        $pokemonMeta->setHeightStdDev(0.1125);
        $pokemonMeta->setBaseStamina(122);
        $pokemonMeta->setCylRadiusM(0.495);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(142);
        $pokemonMeta->setDiskRadiusM(0.7425);
        $pokemonMeta->setCollisionRadiusM(0.297);
        $pokemonMeta->setPokedexWeightKg(19.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.2475);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.99);
        $pokemonMeta->setUniqueId("V0033_POKEMON_NIDORINO");
        $pokemonMeta->setBaseDefense(128);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(2.4375);
        $pokemonMeta->setCylHeightM(0.792);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.594);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::NIDORAN_MALE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_STING_FAST,
            PokemonMove::POISON_JAB_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::DIG,
            PokemonMove::HORN_ATTACK,
        )));
        $pokemonMeta->setNumber(33);
        self::$POKEMON_META[PokemonId::NIDORINO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0034_POKEMON_NIDOKING");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_NIDORAN_MALE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setPokedexHeightM(1.4);
        $pokemonMeta->setHeightStdDev(0.175);
        $pokemonMeta->setBaseStamina(162);
        $pokemonMeta->setCylRadiusM(0.5481);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(204);
        $pokemonMeta->setDiskRadiusM(0.8222);
        $pokemonMeta->setCollisionRadiusM(0.5481);
        $pokemonMeta->setPokedexWeightKg(62);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.27405);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0034_POKEMON_NIDOKING");
        $pokemonMeta->setBaseDefense(170);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(7.75);
        $pokemonMeta->setCylHeightM(1.305);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.87);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::NIDORINO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::FURY_CUTTER_FAST,
            PokemonMove::POISON_JAB_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::MEGAHORN,
            PokemonMove::EARTHQUAKE,
            PokemonMove::SLUDGE_WAVE,
        )));
        $pokemonMeta->setNumber(34);
        self::$POKEMON_META[PokemonId::NIDOKING] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0035_POKEMON_CLEFAIRY");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CLEFAIRY);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(140);
        $pokemonMeta->setCylRadiusM(0.45);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(116);
        $pokemonMeta->setDiskRadiusM(0.675);
        $pokemonMeta->setCollisionRadiusM(0.3125);
        $pokemonMeta->setPokedexWeightKg(7.5);
        $pokemonMeta->setMovementType(MovementType::NORMAL);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FAIRY);
        $pokemonMeta->setCollisionHeadRadiusM(0.225);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.25);
        $pokemonMeta->setUniqueId("V0035_POKEMON_CLEFAIRY");
        $pokemonMeta->setBaseDefense(124);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.9375);
        $pokemonMeta->setCylHeightM(0.75);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.75);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DISARMING_VOICE,
            PokemonMove::MOONBLAST,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(35);
        self::$POKEMON_META[PokemonId::CLEFAIRY] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0036_POKEMON_CLEFABLE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CLEFAIRY);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(190);
        $pokemonMeta->setCylRadiusM(0.712);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(178);
        $pokemonMeta->setDiskRadiusM(1.1681);
        $pokemonMeta->setCollisionRadiusM(0.445);
        $pokemonMeta->setPokedexWeightKg(40);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FAIRY);
        $pokemonMeta->setCollisionHeadRadiusM(0.445);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.89);
        $pokemonMeta->setUniqueId("V0036_POKEMON_CLEFABLE");
        $pokemonMeta->setBaseDefense(178);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(5);
        $pokemonMeta->setCylHeightM(1.44625);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.1125);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::CLEFAIRY);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DAZZLING_GLEAM,
            PokemonMove::PSYCHIC,
            PokemonMove::MOONBLAST,
        )));
        $pokemonMeta->setNumber(36);
        self::$POKEMON_META[PokemonId::CLEFABLE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0037_POKEMON_VULPIX");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_VULPIX);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(76);
        $pokemonMeta->setCylRadiusM(0.567);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(106);
        $pokemonMeta->setDiskRadiusM(0.8505);
        $pokemonMeta->setCollisionRadiusM(0.315);
        $pokemonMeta->setPokedexWeightKg(9.9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.252);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.26);
        $pokemonMeta->setUniqueId("V0037_POKEMON_VULPIX");
        $pokemonMeta->setBaseDefense(118);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(1.2375);
        $pokemonMeta->setCylHeightM(0.756);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.63);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::EMBER_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAME_CHARGE,
            PokemonMove::FLAMETHROWER,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(37);
        self::$POKEMON_META[PokemonId::VULPIX] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0038_POKEMON_NINETALES");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_VULPIX);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(146);
        $pokemonMeta->setCylRadiusM(0.864);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(176);
        $pokemonMeta->setDiskRadiusM(1.296);
        $pokemonMeta->setCollisionRadiusM(0.36);
        $pokemonMeta->setPokedexWeightKg(19.9);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.24);
        $pokemonMeta->setMovementTimerS(5);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.96);
        $pokemonMeta->setUniqueId("V0038_POKEMON_NINETALES");
        $pokemonMeta->setBaseDefense(194);
        $pokemonMeta->setAttackTimerS(14);
        $pokemonMeta->setWeightStdDev(2.4875);
        $pokemonMeta->setCylHeightM(1.2);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.96);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::VULPIX);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::FEINT_ATTACK_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAMETHROWER,
            PokemonMove::HEAT_WAVE,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(38);
        self::$POKEMON_META[PokemonId::NINETALES] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0039_POKEMON_JIGGLYPUFF");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_JIGGLYPUFF);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FAIRY);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(230);
        $pokemonMeta->setCylRadiusM(0.512);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(98);
        $pokemonMeta->setDiskRadiusM(0.768);
        $pokemonMeta->setCollisionRadiusM(0.32);
        $pokemonMeta->setPokedexWeightKg(5.5);
        $pokemonMeta->setMovementType(MovementType::NORMAL);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.256);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(3);
        $pokemonMeta->setModelScale(1.28);
        $pokemonMeta->setUniqueId("V0039_POKEMON_JIGGLYPUFF");
        $pokemonMeta->setBaseDefense(54);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.6875);
        $pokemonMeta->setCylHeightM(0.96);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.64);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
            PokemonMove::FEINT_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DISARMING_VOICE,
            PokemonMove::PLAY_ROUGH,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(39);
        self::$POKEMON_META[PokemonId::JIGGLYPUFF] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0040_POKEMON_WIGGLYTUFF");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_JIGGLYPUFF);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FAIRY);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(280);
        $pokemonMeta->setCylRadiusM(0.445);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(168);
        $pokemonMeta->setDiskRadiusM(1.0013);
        $pokemonMeta->setCollisionRadiusM(0.356);
        $pokemonMeta->setPokedexWeightKg(12);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.2225);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.89);
        $pokemonMeta->setUniqueId("V0040_POKEMON_WIGGLYTUFF");
        $pokemonMeta->setBaseDefense(108);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(1.5);
        $pokemonMeta->setCylHeightM(1.22375);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.89);
        $pokemonMeta->setShoulderModeScale(0.4);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::JIGGLYPUFF);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
            PokemonMove::FEINT_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DAZZLING_GLEAM,
            PokemonMove::PLAY_ROUGH,
            PokemonMove::HYPER_BEAM,
        )));
        $pokemonMeta->setNumber(40);
        self::$POKEMON_META[PokemonId::WIGGLYTUFF] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0041_POKEMON_ZUBAT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ZUBAT);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.642);
        $pokemonMeta->setBaseFleeRate(0.2);
        $pokemonMeta->setBaseAttack(88);
        $pokemonMeta->setDiskRadiusM(0.963);
        $pokemonMeta->setCollisionRadiusM(0.0535);
        $pokemonMeta->setPokedexWeightKg(7.5);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.1605);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.07);
        $pokemonMeta->setUniqueId("V0041_POKEMON_ZUBAT");
        $pokemonMeta->setBaseDefense(90);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.9375);
        $pokemonMeta->setCylHeightM(0.6955);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.0535);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.535);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POISON_FANG,
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::AIR_CUTTER,
        )));
        $pokemonMeta->setNumber(41);
        self::$POKEMON_META[PokemonId::ZUBAT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0042_POKEMON_GOLBAT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ZUBAT);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(150);
        $pokemonMeta->setCylRadiusM(0.75);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(164);
        $pokemonMeta->setDiskRadiusM(1.5975);
        $pokemonMeta->setCollisionRadiusM(0.0355);
        $pokemonMeta->setPokedexWeightKg(55);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.355);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.71);
        $pokemonMeta->setUniqueId("V0042_POKEMON_GOLBAT");
        $pokemonMeta->setBaseDefense(164);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(6.875);
        $pokemonMeta->setCylHeightM(1.2425);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.0355);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::ZUBAT);
        $pokemonMeta->setCylGroundM(1.065);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::WING_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POISON_FANG,
            PokemonMove::AIR_CUTTER,
            PokemonMove::OMINOUS_WIND,
        )));
        $pokemonMeta->setNumber(42);
        self::$POKEMON_META[PokemonId::GOLBAT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0043_POKEMON_ODDISH");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ODDISH);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(90);
        $pokemonMeta->setCylRadiusM(0.405);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(134);
        $pokemonMeta->setDiskRadiusM(0.6075);
        $pokemonMeta->setCollisionRadiusM(0.2025);
        $pokemonMeta->setPokedexWeightKg(5.4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.2025);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.35);
        $pokemonMeta->setUniqueId("V0043_POKEMON_ODDISH");
        $pokemonMeta->setBaseDefense(130);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.675);
        $pokemonMeta->setCylHeightM(0.81000012);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.50625);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.48);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::SEED_BOMB,
            PokemonMove::MOONBLAST,
        )));
        $pokemonMeta->setNumber(43);
        self::$POKEMON_META[PokemonId::ODDISH] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0044_POKEMON_GLOOM");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ODDISH);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.495);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(162);
        $pokemonMeta->setDiskRadiusM(0.7425);
        $pokemonMeta->setCollisionRadiusM(0.4125);
        $pokemonMeta->setPokedexWeightKg(8.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.2475);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0044_POKEMON_GLOOM");
        $pokemonMeta->setBaseDefense(158);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(1.075);
        $pokemonMeta->setCylHeightM(0.88000011);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.88000011);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::ODDISH);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::PETAL_BLIZZARD,
            PokemonMove::MOONBLAST,
        )));
        $pokemonMeta->setNumber(44);
        self::$POKEMON_META[PokemonId::GLOOM] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0045_POKEMON_VILEPLUME");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ODDISH);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(150);
        $pokemonMeta->setCylRadiusM(0.828);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(202);
        $pokemonMeta->setDiskRadiusM(1.242);
        $pokemonMeta->setCollisionRadiusM(1.012);
        $pokemonMeta->setPokedexWeightKg(18.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.552);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.92);
        $pokemonMeta->setUniqueId("V0045_POKEMON_VILEPLUME");
        $pokemonMeta->setBaseDefense(190);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(2.325);
        $pokemonMeta->setCylHeightM(1.196);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.196);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::GLOOM);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::MOONBLAST,
            PokemonMove::PETAL_BLIZZARD,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(45);
        self::$POKEMON_META[PokemonId::VILEPLUME] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0046_POKEMON_PARAS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PARAS);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.384);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(122);
        $pokemonMeta->setDiskRadiusM(0.576);
        $pokemonMeta->setCollisionRadiusM(0.192);
        $pokemonMeta->setPokedexWeightKg(5.4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.192);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1.1);
        $pokemonMeta->setModelScale(1.28);
        $pokemonMeta->setUniqueId("V0046_POKEMON_PARAS");
        $pokemonMeta->setBaseDefense(120);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(0.675);
        $pokemonMeta->setCylHeightM(0.448);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.32);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BITE_FAST,
            PokemonMove::SCRATCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::CROSS_POISON,
            PokemonMove::X_SCISSOR,
            PokemonMove::SEED_BOMB,
        )));
        $pokemonMeta->setNumber(46);
        self::$POKEMON_META[PokemonId::PARAS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0047_POKEMON_PARASECT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PARAS);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.6313);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(162);
        $pokemonMeta->setDiskRadiusM(0.9469);
        $pokemonMeta->setCollisionRadiusM(0.4545);
        $pokemonMeta->setPokedexWeightKg(29.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.505);
        $pokemonMeta->setMovementTimerS(17);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.01);
        $pokemonMeta->setUniqueId("V0047_POKEMON_PARASECT");
        $pokemonMeta->setBaseDefense(170);
        $pokemonMeta->setAttackTimerS(6);
        $pokemonMeta->setWeightStdDev(3.6875);
        $pokemonMeta->setCylHeightM(1.01);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.01);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::PARAS);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BITE_FAST,
            PokemonMove::FURY_CUTTER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::CROSS_POISON,
            PokemonMove::X_SCISSOR,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(47);
        self::$POKEMON_META[PokemonId::PARASECT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0048_POKEMON_VENONAT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_VENONAT);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.5325);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(108);
        $pokemonMeta->setDiskRadiusM(0.7988);
        $pokemonMeta->setCollisionRadiusM(0.355);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.26625);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.71);
        $pokemonMeta->setUniqueId("V0048_POKEMON_VENONAT");
        $pokemonMeta->setBaseDefense(118);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(1.1715);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.71);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::BUG_BITE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DAZZLING_GLEAM,
            PokemonMove::SHADOW_BALL,
            PokemonMove::PSYBEAM,
        )));
        $pokemonMeta->setNumber(48);
        self::$POKEMON_META[PokemonId::VENONAT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0049_POKEMON_VENOMOTH");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_VENONAT);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(140);
        $pokemonMeta->setCylRadiusM(0.576);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(172);
        $pokemonMeta->setDiskRadiusM(0.864);
        $pokemonMeta->setCollisionRadiusM(0.36);
        $pokemonMeta->setPokedexWeightKg(12.5);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.288);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.72);
        $pokemonMeta->setUniqueId("V0049_POKEMON_VENOMOTH");
        $pokemonMeta->setBaseDefense(154);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(1.5625);
        $pokemonMeta->setCylHeightM(1.08);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.72);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::VENONAT);
        $pokemonMeta->setCylGroundM(0.36);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::BUG_BITE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POISON_FANG,
            PokemonMove::PSYCHIC,
            PokemonMove::BUG_BUZZ,
        )));
        $pokemonMeta->setNumber(49);
        self::$POKEMON_META[PokemonId::VENOMOTH] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0050_POKEMON_DIGLETT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DIGLETT);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.2);
        $pokemonMeta->setHeightStdDev(0.025);
        $pokemonMeta->setBaseStamina(20);
        $pokemonMeta->setCylRadiusM(0.3);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(108);
        $pokemonMeta->setDiskRadiusM(0.45);
        $pokemonMeta->setCollisionRadiusM(0.16);
        $pokemonMeta->setPokedexWeightKg(0.8);
        $pokemonMeta->setMovementType(MovementType::NORMAL);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.18);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(0);
        $pokemonMeta->setModelScale(2);
        $pokemonMeta->setUniqueId("V0050_POKEMON_DIGLETT");
        $pokemonMeta->setBaseDefense(86);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(0.1);
        $pokemonMeta->setCylHeightM(0.4);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.4);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::SCRATCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::MUD_BOMB,
            PokemonMove::ROCK_TOMB,
        )));
        $pokemonMeta->setNumber(50);
        self::$POKEMON_META[PokemonId::DIGLETT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0051_POKEMON_DUGTRIO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DIGLETT);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.7);
        $pokemonMeta->setHeightStdDev(0.0875);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.672);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(148);
        $pokemonMeta->setDiskRadiusM(1.008);
        $pokemonMeta->setCollisionRadiusM(0.448);
        $pokemonMeta->setPokedexWeightKg(33.3);
        $pokemonMeta->setMovementType(MovementType::NORMAL);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.336);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(0);
        $pokemonMeta->setModelScale(1.12);
        $pokemonMeta->setUniqueId("V0051_POKEMON_DUGTRIO");
        $pokemonMeta->setBaseDefense(140);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(4.1625);
        $pokemonMeta->setCylHeightM(0.84);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.84);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::DIGLETT);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SUCKER_PUNCH_FAST,
            PokemonMove::MUD_SHOT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STONE_EDGE,
            PokemonMove::EARTHQUAKE,
            PokemonMove::MUD_BOMB,
        )));
        $pokemonMeta->setNumber(51);
        self::$POKEMON_META[PokemonId::DUGTRIO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0052_POKEMON_MEOWTH");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MEOWTH);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.4);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(104);
        $pokemonMeta->setDiskRadiusM(0.6);
        $pokemonMeta->setCollisionRadiusM(0.128);
        $pokemonMeta->setPokedexWeightKg(4.2);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.2);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.6);
        $pokemonMeta->setUniqueId("V0052_POKEMON_MEOWTH");
        $pokemonMeta->setBaseDefense(94);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(0.525);
        $pokemonMeta->setCylHeightM(0.64);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.4);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::SCRATCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DARK_PULSE,
            PokemonMove::NIGHT_SLASH,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(52);
        self::$POKEMON_META[PokemonId::MEOWTH] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0053_POKEMON_PERSIAN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MEOWTH);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.533);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(156);
        $pokemonMeta->setDiskRadiusM(0.7995);
        $pokemonMeta->setCollisionRadiusM(0.328);
        $pokemonMeta->setPokedexWeightKg(32);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.164);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.82);
        $pokemonMeta->setUniqueId("V0053_POKEMON_PERSIAN");
        $pokemonMeta->setBaseDefense(146);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(4);
        $pokemonMeta->setCylHeightM(0.902);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.615);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MEOWTH);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SCRATCH_FAST,
            PokemonMove::FEINT_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PLAY_ROUGH,
            PokemonMove::POWER_GEM,
            PokemonMove::NIGHT_SLASH,
        )));
        $pokemonMeta->setNumber(53);
        self::$POKEMON_META[PokemonId::PERSIAN] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0054_POKEMON_PSYDUCK");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PSYDUCK);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.3638);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(132);
        $pokemonMeta->setDiskRadiusM(0.5456);
        $pokemonMeta->setCollisionRadiusM(0.291);
        $pokemonMeta->setPokedexWeightKg(19.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.3395);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.97);
        $pokemonMeta->setUniqueId("V0054_POKEMON_PSYDUCK");
        $pokemonMeta->setBaseDefense(112);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(2.45);
        $pokemonMeta->setCylHeightM(0.97);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.60625);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WATER_GUN_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::AQUA_TAIL,
            PokemonMove::PSYBEAM,
            PokemonMove::CROSS_CHOP,
        )));
        $pokemonMeta->setNumber(54);
        self::$POKEMON_META[PokemonId::PSYDUCK] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0055_POKEMON_GOLDUCK");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PSYDUCK);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.7);
        $pokemonMeta->setHeightStdDev(0.2125);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.465);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(194);
        $pokemonMeta->setDiskRadiusM(0.9765);
        $pokemonMeta->setCollisionRadiusM(0.2325);
        $pokemonMeta->setPokedexWeightKg(76.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.2325);
        $pokemonMeta->setMovementTimerS(5);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.93);
        $pokemonMeta->setUniqueId("V0055_POKEMON_GOLDUCK");
        $pokemonMeta->setBaseDefense(176);
        $pokemonMeta->setAttackTimerS(14);
        $pokemonMeta->setWeightStdDev(9.575);
        $pokemonMeta->setCylHeightM(1.3485);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.81375);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::PSYDUCK);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::ICE_BEAM,
        )));
        $pokemonMeta->setNumber(55);
        self::$POKEMON_META[PokemonId::GOLDUCK] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0056_POKEMON_MANKEY");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MANKEY);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.4838);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(122);
        $pokemonMeta->setDiskRadiusM(0.7256);
        $pokemonMeta->setCollisionRadiusM(0.1935);
        $pokemonMeta->setPokedexWeightKg(28);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.129);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.29);
        $pokemonMeta->setUniqueId("V0056_POKEMON_MANKEY");
        $pokemonMeta->setBaseDefense(96);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(3.5);
        $pokemonMeta->setCylHeightM(0.80625);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.645);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::KARATE_CHOP_FAST,
            PokemonMove::SCRATCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::LOW_SWEEP,
            PokemonMove::BRICK_BREAK,
            PokemonMove::CROSS_CHOP,
        )));
        $pokemonMeta->setNumber(56);
        self::$POKEMON_META[PokemonId::MANKEY] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0057_POKEMON_PRIMEAPE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MANKEY);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.46);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(178);
        $pokemonMeta->setDiskRadiusM(0.69);
        $pokemonMeta->setCollisionRadiusM(0.46);
        $pokemonMeta->setPokedexWeightKg(32);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.23);
        $pokemonMeta->setMovementTimerS(17);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.92);
        $pokemonMeta->setUniqueId("V0057_POKEMON_PRIMEAPE");
        $pokemonMeta->setBaseDefense(150);
        $pokemonMeta->setAttackTimerS(6);
        $pokemonMeta->setWeightStdDev(4);
        $pokemonMeta->setCylHeightM(1.15);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.104);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MANKEY);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::KARATE_CHOP_FAST,
            PokemonMove::LOW_KICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::LOW_SWEEP,
            PokemonMove::NIGHT_SLASH,
            PokemonMove::CROSS_CHOP,
        )));
        $pokemonMeta->setNumber(57);
        self::$POKEMON_META[PokemonId::PRIMEAPE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0058_POKEMON_GROWLITHE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GROWLITHE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.7);
        $pokemonMeta->setHeightStdDev(0.0875);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.585);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(156);
        $pokemonMeta->setDiskRadiusM(0.8775);
        $pokemonMeta->setCollisionRadiusM(0.234);
        $pokemonMeta->setPokedexWeightKg(19);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.1755);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.17);
        $pokemonMeta->setUniqueId("V0058_POKEMON_GROWLITHE");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(2.375);
        $pokemonMeta->setCylHeightM(1.02375);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.585);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAME_WHEEL,
            PokemonMove::FLAMETHROWER,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(58);
        self::$POKEMON_META[PokemonId::GROWLITHE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0059_POKEMON_ARCANINE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GROWLITHE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.9);
        $pokemonMeta->setHeightStdDev(0.2375);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.666);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(230);
        $pokemonMeta->setDiskRadiusM(0.999);
        $pokemonMeta->setCollisionRadiusM(0.37);
        $pokemonMeta->setPokedexWeightKg(155);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.333);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.74);
        $pokemonMeta->setUniqueId("V0059_POKEMON_ARCANINE");
        $pokemonMeta->setBaseDefense(180);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(19.375);
        $pokemonMeta->setCylHeightM(1.48);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.74);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::GROWLITHE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::FIRE_FANG_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BULLDOZE,
            PokemonMove::FLAMETHROWER,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(59);
        self::$POKEMON_META[PokemonId::ARCANINE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0060_POKEMON_POLIWAG");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_POLIWAG);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.5);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(108);
        $pokemonMeta->setDiskRadiusM(0.75);
        $pokemonMeta->setCollisionRadiusM(0.3125);
        $pokemonMeta->setPokedexWeightKg(12.4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.3125);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.25);
        $pokemonMeta->setUniqueId("V0060_POKEMON_POLIWAG");
        $pokemonMeta->setBaseDefense(98);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(1.55);
        $pokemonMeta->setCylHeightM(0.875);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.75);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::MUD_BOMB,
            PokemonMove::BUBBLE_BEAM,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(60);
        self::$POKEMON_META[PokemonId::POLIWAG] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0061_POKEMON_POLIWHIRL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_POLIWAG);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.735);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(132);
        $pokemonMeta->setDiskRadiusM(1.1025);
        $pokemonMeta->setCollisionRadiusM(0.49);
        $pokemonMeta->setPokedexWeightKg(20);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.3675);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(0.8);
        $pokemonMeta->setModelScale(0.98);
        $pokemonMeta->setUniqueId("V0061_POKEMON_POLIWHIRL");
        $pokemonMeta->setBaseDefense(132);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(2.5);
        $pokemonMeta->setCylHeightM(1.078);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.882);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::POLIWAG);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SCALD,
            PokemonMove::MUD_BOMB,
            PokemonMove::BUBBLE_BEAM,
        )));
        $pokemonMeta->setNumber(61);
        self::$POKEMON_META[PokemonId::POLIWHIRL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0062_POKEMON_POLIWRATH");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_POLIWAG);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.817);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(180);
        $pokemonMeta->setDiskRadiusM(1.2255);
        $pokemonMeta->setCollisionRadiusM(0.645);
        $pokemonMeta->setPokedexWeightKg(54);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.344);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1.05);
        $pokemonMeta->setModelScale(0.86);
        $pokemonMeta->setUniqueId("V0062_POKEMON_POLIWRATH");
        $pokemonMeta->setBaseDefense(202);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(6.75);
        $pokemonMeta->setCylHeightM(1.204);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.118);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::POLIWHIRL);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::HYDRO_PUMP,
            PokemonMove::SUBMISSION,
            PokemonMove::ICE_PUNCH,
        )));
        $pokemonMeta->setNumber(62);
        self::$POKEMON_META[PokemonId::POLIWRATH] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0063_POKEMON_ABRA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ABRA);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.9);
        $pokemonMeta->setHeightStdDev(0.1125);
        $pokemonMeta->setBaseStamina(50);
        $pokemonMeta->setCylRadiusM(0.448);
        $pokemonMeta->setBaseFleeRate(0.99);
        $pokemonMeta->setBaseAttack(110);
        $pokemonMeta->setDiskRadiusM(0.672);
        $pokemonMeta->setCollisionRadiusM(0.28);
        $pokemonMeta->setPokedexWeightKg(19.5);
        $pokemonMeta->setMovementType(MovementType::PSYCHIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.28);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.12);
        $pokemonMeta->setUniqueId("V0063_POKEMON_ABRA");
        $pokemonMeta->setBaseDefense(76);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(2.4375);
        $pokemonMeta->setCylHeightM(0.784);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.56);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.168);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SHADOW_BALL,
            PokemonMove::PSYSHOCK,
            PokemonMove::SIGNAL_BEAM,
        )));
        $pokemonMeta->setNumber(63);
        self::$POKEMON_META[PokemonId::ABRA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0064_POKEMON_KADABRA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ABRA);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.6675);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(150);
        $pokemonMeta->setDiskRadiusM(1.0013);
        $pokemonMeta->setCollisionRadiusM(0.445);
        $pokemonMeta->setPokedexWeightKg(56.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.33375);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.89);
        $pokemonMeta->setUniqueId("V0064_POKEMON_KADABRA");
        $pokemonMeta->setBaseDefense(112);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(7.0625);
        $pokemonMeta->setCylHeightM(1.157);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.89);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::ABRA);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::PSYCHO_CUT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DAZZLING_GLEAM,
            PokemonMove::SHADOW_BALL,
            PokemonMove::PSYBEAM,
        )));
        $pokemonMeta->setNumber(64);
        self::$POKEMON_META[PokemonId::KADABRA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0065_POKEMON_ALAKAZAM");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ABRA);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.51);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(186);
        $pokemonMeta->setDiskRadiusM(0.765);
        $pokemonMeta->setCollisionRadiusM(0.425);
        $pokemonMeta->setPokedexWeightKg(48);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.255);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.85);
        $pokemonMeta->setUniqueId("V0065_POKEMON_ALAKAZAM");
        $pokemonMeta->setBaseDefense(152);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(6);
        $pokemonMeta->setCylHeightM(1.275);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.93500012);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::KADABRA);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::PSYCHO_CUT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::DAZZLING_GLEAM,
            PokemonMove::SHADOW_BALL,
        )));
        $pokemonMeta->setNumber(65);
        self::$POKEMON_META[PokemonId::ALAKAZAM] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0066_POKEMON_MACHOP");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MACHOP);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(140);
        $pokemonMeta->setCylRadiusM(0.4125);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(118);
        $pokemonMeta->setDiskRadiusM(0.6188);
        $pokemonMeta->setCollisionRadiusM(0.22);
        $pokemonMeta->setPokedexWeightKg(19.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.20625);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0066_POKEMON_MACHOP");
        $pokemonMeta->setBaseDefense(96);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(2.4375);
        $pokemonMeta->setCylHeightM(0.88000011);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.55);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::KARATE_CHOP_FAST,
            PokemonMove::LOW_KICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::LOW_SWEEP,
            PokemonMove::BRICK_BREAK,
            PokemonMove::CROSS_CHOP,
        )));
        $pokemonMeta->setNumber(66);
        self::$POKEMON_META[PokemonId::MACHOP] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0067_POKEMON_MACHOKE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MACHOP);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.546);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(154);
        $pokemonMeta->setDiskRadiusM(0.819);
        $pokemonMeta->setCollisionRadiusM(0.54600012);
        $pokemonMeta->setPokedexWeightKg(70.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.1365);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.91);
        $pokemonMeta->setUniqueId("V0067_POKEMON_MACHOKE");
        $pokemonMeta->setBaseDefense(144);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(8.8125);
        $pokemonMeta->setCylHeightM(1.274);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(1.092);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::MACHOP);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::KARATE_CHOP_FAST,
            PokemonMove::LOW_KICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SUBMISSION,
            PokemonMove::BRICK_BREAK,
            PokemonMove::CROSS_CHOP,
        )));
        $pokemonMeta->setNumber(67);
        self::$POKEMON_META[PokemonId::MACHOKE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0068_POKEMON_MACHAMP");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MACHOP);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.5785);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(198);
        $pokemonMeta->setDiskRadiusM(0.8678);
        $pokemonMeta->setCollisionRadiusM(0.5785);
        $pokemonMeta->setPokedexWeightKg(130);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.1335);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.89);
        $pokemonMeta->setUniqueId("V0068_POKEMON_MACHAMP");
        $pokemonMeta->setBaseDefense(180);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(16.25);
        $pokemonMeta->setCylHeightM(1.424);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.246);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::MACHOKE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::KARATE_CHOP_FAST,
            PokemonMove::BULLET_PUNCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STONE_EDGE,
            PokemonMove::SUBMISSION,
            PokemonMove::CROSS_CHOP,
        )));
        $pokemonMeta->setNumber(68);
        self::$POKEMON_META[PokemonId::MACHAMP] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0069_POKEMON_BELLSPROUT");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_BELLSPROUT);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.7);
        $pokemonMeta->setHeightStdDev(0.0875);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.4515);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(158);
        $pokemonMeta->setDiskRadiusM(0.6773);
        $pokemonMeta->setCollisionRadiusM(0.1935);
        $pokemonMeta->setPokedexWeightKg(4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.22575);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(1.29);
        $pokemonMeta->setUniqueId("V0069_POKEMON_BELLSPROUT");
        $pokemonMeta->setBaseDefense(78);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.5);
        $pokemonMeta->setCylHeightM(0.90299988);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.4515);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::VINE_WHIP_FAST,
            PokemonMove::ACID_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POWER_WHIP,
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::WRAP,
        )));
        $pokemonMeta->setNumber(69);
        self::$POKEMON_META[PokemonId::BELLSPROUT] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0070_POKEMON_WEEPINBELL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_BELLSPROUT);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.65);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(190);
        $pokemonMeta->setDiskRadiusM(0.975);
        $pokemonMeta->setCollisionRadiusM(0.25);
        $pokemonMeta->setPokedexWeightKg(6.4);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.25);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0070_POKEMON_WEEPINBELL");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.8);
        $pokemonMeta->setCylHeightM(1);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.95);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::BELLSPROUT);
        $pokemonMeta->setCylGroundM(0.375);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POWER_WHIP,
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::SEED_BOMB,
        )));
        $pokemonMeta->setNumber(70);
        self::$POKEMON_META[PokemonId::WEEPINBELL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0071_POKEMON_VICTREEBEL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_BELLSPROUT);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.7);
        $pokemonMeta->setHeightStdDev(0.2125);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.546);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(222);
        $pokemonMeta->setDiskRadiusM(0.819);
        $pokemonMeta->setCollisionRadiusM(0.336);
        $pokemonMeta->setPokedexWeightKg(15.5);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.273);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.84);
        $pokemonMeta->setUniqueId("V0071_POKEMON_VICTREEBEL");
        $pokemonMeta->setBaseDefense(152);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(1.9375);
        $pokemonMeta->setCylHeightM(1.428);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.428);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::WEEPINBELL);
        $pokemonMeta->setCylGroundM(0.42);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::RAZOR_LEAF_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::LEAF_BLADE,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(71);
        self::$POKEMON_META[PokemonId::VICTREEBEL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0072_POKEMON_TENTACOOL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_TENTACOOL);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(0.9);
        $pokemonMeta->setHeightStdDev(0.1125);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.315);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(106);
        $pokemonMeta->setDiskRadiusM(0.4725);
        $pokemonMeta->setCollisionRadiusM(0.21);
        $pokemonMeta->setPokedexWeightKg(45.5);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.1575);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.05);
        $pokemonMeta->setUniqueId("V0072_POKEMON_TENTACOOL");
        $pokemonMeta->setBaseDefense(136);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(5.6875);
        $pokemonMeta->setCylHeightM(0.91874993);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.91874993);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.2625);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_STING_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::WATER_PULSE,
            PokemonMove::BUBBLE_BEAM,
            PokemonMove::WRAP,
        )));
        $pokemonMeta->setNumber(72);
        self::$POKEMON_META[PokemonId::TENTACOOL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0073_POKEMON_TENTACRUEL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_TENTACOOL);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.492);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(170);
        $pokemonMeta->setDiskRadiusM(0.738);
        $pokemonMeta->setCollisionRadiusM(0.492);
        $pokemonMeta->setPokedexWeightKg(55);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.246);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.82);
        $pokemonMeta->setUniqueId("V0073_POKEMON_TENTACRUEL");
        $pokemonMeta->setBaseDefense(196);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(6.875);
        $pokemonMeta->setCylHeightM(1.312);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.23);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::TENTACOOL);
        $pokemonMeta->setCylGroundM(0.205);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::POISON_JAB_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BLIZZARD,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::SLUDGE_WAVE,
        )));
        $pokemonMeta->setNumber(73);
        self::$POKEMON_META[PokemonId::TENTACRUEL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0074_POKEMON_GEODUDE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GEODUDE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.3915);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(106);
        $pokemonMeta->setDiskRadiusM(0.5873);
        $pokemonMeta->setCollisionRadiusM(0.3915);
        $pokemonMeta->setPokedexWeightKg(20);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.19575);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0074_POKEMON_GEODUDE");
        $pokemonMeta->setBaseDefense(118);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(2.5);
        $pokemonMeta->setCylHeightM(0.348);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.1305);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.261);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ROCK_THROW_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::ROCK_SLIDE,
            PokemonMove::ROCK_TOMB,
        )));
        $pokemonMeta->setNumber(74);
        self::$POKEMON_META[PokemonId::GEODUDE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0075_POKEMON_GRAVELER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GEODUDE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.697);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(142);
        $pokemonMeta->setDiskRadiusM(1.0455);
        $pokemonMeta->setCollisionRadiusM(0.492);
        $pokemonMeta->setPokedexWeightKg(105);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.369);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(0.82);
        $pokemonMeta->setUniqueId("V0075_POKEMON_GRAVELER");
        $pokemonMeta->setBaseDefense(156);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(13.125);
        $pokemonMeta->setCylHeightM(0.82);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(0.697);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.2);
        $pokemonMeta->setParentId(PokemonId::GEODUDE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::ROCK_THROW_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::ROCK_SLIDE,
            PokemonMove::STONE_EDGE,
        )));
        $pokemonMeta->setNumber(75);
        self::$POKEMON_META[PokemonId::GRAVELER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0076_POKEMON_GOLEM");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GEODUDE);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setPokedexHeightM(1.4);
        $pokemonMeta->setHeightStdDev(0.175);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.63);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(176);
        $pokemonMeta->setDiskRadiusM(0.945);
        $pokemonMeta->setCollisionRadiusM(0.63);
        $pokemonMeta->setPokedexWeightKg(300);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.315);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(0.84);
        $pokemonMeta->setUniqueId("V0076_POKEMON_GOLEM");
        $pokemonMeta->setBaseDefense(198);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(37.5);
        $pokemonMeta->setCylHeightM(1.092);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.092);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.1);
        $pokemonMeta->setParentId(PokemonId::GRAVELER);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::ROCK_THROW_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STONE_EDGE,
            PokemonMove::EARTHQUAKE,
            PokemonMove::ANCIENT_POWER,
        )));
        $pokemonMeta->setNumber(76);
        self::$POKEMON_META[PokemonId::GOLEM] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0077_POKEMON_PONYTA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PONYTA);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.3788);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(168);
        $pokemonMeta->setDiskRadiusM(0.5681);
        $pokemonMeta->setCollisionRadiusM(0.2525);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.202);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(0.95);
        $pokemonMeta->setModelScale(1.01);
        $pokemonMeta->setUniqueId("V0077_POKEMON_PONYTA");
        $pokemonMeta->setBaseDefense(138);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(1.2625);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.63125);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::EMBER_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAME_WHEEL,
            PokemonMove::FLAME_CHARGE,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(77);
        self::$POKEMON_META[PokemonId::PONYTA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0078_POKEMON_RAPIDASH");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PONYTA);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.7);
        $pokemonMeta->setHeightStdDev(0.2125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.405);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(200);
        $pokemonMeta->setDiskRadiusM(0.6075);
        $pokemonMeta->setCollisionRadiusM(0.324);
        $pokemonMeta->setPokedexWeightKg(95);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.243);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.81);
        $pokemonMeta->setUniqueId("V0078_POKEMON_RAPIDASH");
        $pokemonMeta->setBaseDefense(170);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(11.875);
        $pokemonMeta->setCylHeightM(1.701);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.891);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::PONYTA);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::LOW_KICK_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::HEAT_WAVE,
            PokemonMove::DRILL_RUN,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(78);
        self::$POKEMON_META[PokemonId::RAPIDASH] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0079_POKEMON_SLOWPOKE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SLOWPOKE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.5925);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(110);
        $pokemonMeta->setDiskRadiusM(1.185);
        $pokemonMeta->setCollisionRadiusM(0.316);
        $pokemonMeta->setPokedexWeightKg(36);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.29625);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.79);
        $pokemonMeta->setUniqueId("V0079_POKEMON_SLOWPOKE");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(4.5);
        $pokemonMeta->setCylHeightM(0.94800007);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.5135);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::WATER_PULSE,
            PokemonMove::PSYSHOCK,
        )));
        $pokemonMeta->setNumber(79);
        self::$POKEMON_META[PokemonId::SLOWPOKE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0080_POKEMON_SLOWBRO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SLOWPOKE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(190);
        $pokemonMeta->setCylRadiusM(0.4675);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(184);
        $pokemonMeta->setDiskRadiusM(0.7013);
        $pokemonMeta->setCollisionRadiusM(0.425);
        $pokemonMeta->setPokedexWeightKg(78.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.255);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.85);
        $pokemonMeta->setUniqueId("V0080_POKEMON_SLOWBRO");
        $pokemonMeta->setBaseDefense(198);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(9.8125);
        $pokemonMeta->setCylHeightM(1.275);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.85);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::SLOWPOKE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::WATER_PULSE,
            PokemonMove::ICE_BEAM,
        )));
        $pokemonMeta->setNumber(80);
        self::$POKEMON_META[PokemonId::SLOWBRO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0081_POKEMON_MAGNEMITE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MAGNEMITE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_STEEL);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(50);
        $pokemonMeta->setCylRadiusM(0.456);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(128);
        $pokemonMeta->setDiskRadiusM(0.684);
        $pokemonMeta->setCollisionRadiusM(0.456);
        $pokemonMeta->setPokedexWeightKg(6);
        $pokemonMeta->setMovementType(MovementType::ELECTRIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.228);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.52);
        $pokemonMeta->setUniqueId("V0081_POKEMON_MAGNEMITE");
        $pokemonMeta->setBaseDefense(138);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.75);
        $pokemonMeta->setCylHeightM(0.456);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.456);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.912);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SPARK_FAST,
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::MAGNET_BOMB,
            PokemonMove::THUNDERBOLT,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(81);
        self::$POKEMON_META[PokemonId::MAGNEMITE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0082_POKEMON_MAGNETON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MAGNEMITE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_STEEL);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.44);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(186);
        $pokemonMeta->setDiskRadiusM(0.66);
        $pokemonMeta->setCollisionRadiusM(0.44);
        $pokemonMeta->setPokedexWeightKg(60);
        $pokemonMeta->setMovementType(MovementType::ELECTRIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.22);
        $pokemonMeta->setMovementTimerS(5);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0082_POKEMON_MAGNETON");
        $pokemonMeta->setBaseDefense(180);
        $pokemonMeta->setAttackTimerS(14);
        $pokemonMeta->setWeightStdDev(7.5);
        $pokemonMeta->setCylHeightM(1.1);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.825);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MAGNEMITE);
        $pokemonMeta->setCylGroundM(0.44);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SPARK_FAST,
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::MAGNET_BOMB,
            PokemonMove::FLASH_CANNON,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(82);
        self::$POKEMON_META[PokemonId::MAGNETON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0083_POKEMON_FARFETCHD");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_FARFETCHD);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(104);
        $pokemonMeta->setCylRadiusM(0.452);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(138);
        $pokemonMeta->setDiskRadiusM(0.678);
        $pokemonMeta->setCollisionRadiusM(0.2825);
        $pokemonMeta->setPokedexWeightKg(15);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.2825);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.13);
        $pokemonMeta->setUniqueId("V0083_POKEMON_FARFETCHD");
        $pokemonMeta->setBaseDefense(132);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(1.875);
        $pokemonMeta->setCylHeightM(0.8475);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.42375);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::FURY_CUTTER_FAST,
            PokemonMove::CUT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::AERIAL_ACE,
            PokemonMove::LEAF_BLADE,
            PokemonMove::AIR_CUTTER,
        )));
        $pokemonMeta->setNumber(83);
        self::$POKEMON_META[PokemonId::FARFETCHD] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0084_POKEMON_DODUO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DODUO);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.4);
        $pokemonMeta->setHeightStdDev(0.175);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.396);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(126);
        $pokemonMeta->setDiskRadiusM(0.594);
        $pokemonMeta->setCollisionRadiusM(0.352);
        $pokemonMeta->setPokedexWeightKg(39.2);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.198);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.88);
        $pokemonMeta->setUniqueId("V0084_POKEMON_DODUO");
        $pokemonMeta->setBaseDefense(96);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(4.9);
        $pokemonMeta->setCylHeightM(1.232);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(1.232);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::QUICK_ATTACK_FAST,
            PokemonMove::PECK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::AERIAL_ACE,
            PokemonMove::DRILL_PECK,
            PokemonMove::SWIFT,
        )));
        $pokemonMeta->setNumber(84);
        self::$POKEMON_META[PokemonId::DODUO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0085_POKEMON_DODRIO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DODUO);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.8);
        $pokemonMeta->setHeightStdDev(0.225);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.5148);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(182);
        $pokemonMeta->setDiskRadiusM(0.7722);
        $pokemonMeta->setCollisionRadiusM(0.39);
        $pokemonMeta->setPokedexWeightKg(85.2);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.2574);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.78);
        $pokemonMeta->setUniqueId("V0085_POKEMON_DODRIO");
        $pokemonMeta->setBaseDefense(150);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(10.65);
        $pokemonMeta->setCylHeightM(1.287);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.287);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::DODUO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::STEEL_WING_FAST,
            PokemonMove::FEINT_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::AERIAL_ACE,
            PokemonMove::DRILL_PECK,
            PokemonMove::AIR_CUTTER,
        )));
        $pokemonMeta->setNumber(85);
        self::$POKEMON_META[PokemonId::DODRIO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0086_POKEMON_SEEL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SEEL);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.275);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(104);
        $pokemonMeta->setDiskRadiusM(0.4125);
        $pokemonMeta->setCollisionRadiusM(0.275);
        $pokemonMeta->setPokedexWeightKg(90);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.22);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(0.9);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0086_POKEMON_SEEL");
        $pokemonMeta->setBaseDefense(138);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(11.25);
        $pokemonMeta->setCylHeightM(0.55);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.4125);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WATER_GUN_FAST,
            PokemonMove::ICE_SHARD_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICY_WIND,
            PokemonMove::AQUA_TAIL,
            PokemonMove::AQUA_JET,
        )));
        $pokemonMeta->setNumber(86);
        self::$POKEMON_META[PokemonId::SEEL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0087_POKEMON_DEWGONG");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SEEL);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_ICE);
        $pokemonMeta->setPokedexHeightM(1.7);
        $pokemonMeta->setHeightStdDev(0.2125);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.525);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(156);
        $pokemonMeta->setDiskRadiusM(0.7875);
        $pokemonMeta->setCollisionRadiusM(0.315);
        $pokemonMeta->setPokedexWeightKg(120);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.13125);
        $pokemonMeta->setMovementTimerS(5);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.05);
        $pokemonMeta->setUniqueId("V0087_POKEMON_DEWGONG");
        $pokemonMeta->setBaseDefense(192);
        $pokemonMeta->setAttackTimerS(14);
        $pokemonMeta->setWeightStdDev(15);
        $pokemonMeta->setCylHeightM(0.84);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.63);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::SEEL);
        $pokemonMeta->setCylGroundM(0.39375);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ICE_SHARD_FAST,
            PokemonMove::FROST_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICY_WIND,
            PokemonMove::BLIZZARD,
            PokemonMove::AQUA_JET,
        )));
        $pokemonMeta->setNumber(87);
        self::$POKEMON_META[PokemonId::DEWGONG] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0088_POKEMON_GRIMER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GRIMER);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.9);
        $pokemonMeta->setHeightStdDev(0.1125);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.588);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(124);
        $pokemonMeta->setDiskRadiusM(0.882);
        $pokemonMeta->setCollisionRadiusM(0.49);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.294);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.98);
        $pokemonMeta->setUniqueId("V0088_POKEMON_GRIMER");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(0.98);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.83300012);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SLAP_FAST,
            PokemonMove::ACID_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::MUD_BOMB,
            PokemonMove::SLUDGE,
        )));
        $pokemonMeta->setNumber(88);
        self::$POKEMON_META[PokemonId::GRIMER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0089_POKEMON_MUK");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GRIMER);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(210);
        $pokemonMeta->setCylRadiusM(0.86);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(180);
        $pokemonMeta->setDiskRadiusM(1.14);
        $pokemonMeta->setCollisionRadiusM(0.76);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.38);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.76);
        $pokemonMeta->setUniqueId("V0089_POKEMON_MUK");
        $pokemonMeta->setBaseDefense(188);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(0.912);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.57);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::GRIMER);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::POISON_JAB_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DARK_PULSE,
            PokemonMove::GUNK_SHOT,
            PokemonMove::SLUDGE_WAVE,
        )));
        $pokemonMeta->setNumber(89);
        self::$POKEMON_META[PokemonId::MUK] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0090_POKEMON_SHELLDER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SHELLDER);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.3864);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(120);
        $pokemonMeta->setDiskRadiusM(0.5796);
        $pokemonMeta->setCollisionRadiusM(0.336);
        $pokemonMeta->setPokedexWeightKg(4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.294);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(1.68);
        $pokemonMeta->setUniqueId("V0090_POKEMON_SHELLDER");
        $pokemonMeta->setBaseDefense(112);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(0.5);
        $pokemonMeta->setCylHeightM(0.504);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.504);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ICE_SHARD_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICY_WIND,
            PokemonMove::WATER_PULSE,
            PokemonMove::BUBBLE_BEAM,
        )));
        $pokemonMeta->setNumber(90);
        self::$POKEMON_META[PokemonId::SHELLDER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0091_POKEMON_CLOYSTER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SHELLDER);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_ICE);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.63);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(196);
        $pokemonMeta->setDiskRadiusM(0.945);
        $pokemonMeta->setCollisionRadiusM(0.42);
        $pokemonMeta->setPokedexWeightKg(132.5);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.54599988);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.84);
        $pokemonMeta->setUniqueId("V0091_POKEMON_CLOYSTER");
        $pokemonMeta->setBaseDefense(196);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(16.5625);
        $pokemonMeta->setCylHeightM(1.05);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.05);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::SHELLDER);
        $pokemonMeta->setCylGroundM(0.42);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ICE_SHARD_FAST,
            PokemonMove::FROST_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICY_WIND,
            PokemonMove::BLIZZARD,
            PokemonMove::HYDRO_PUMP,
        )));
        $pokemonMeta->setNumber(91);
        self::$POKEMON_META[PokemonId::CLOYSTER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0092_POKEMON_GASTLY");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GASTLY);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.45);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(136);
        $pokemonMeta->setDiskRadiusM(0.675);
        $pokemonMeta->setCollisionRadiusM(0.25);
        $pokemonMeta->setPokedexWeightKg(0.1);
        $pokemonMeta->setMovementType(MovementType::PSYCHIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GHOST);
        $pokemonMeta->setCollisionHeadRadiusM(0.3);
        $pokemonMeta->setMovementTimerS(29);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0092_POKEMON_GASTLY");
        $pokemonMeta->setBaseDefense(82);
        $pokemonMeta->setAttackTimerS(10);
        $pokemonMeta->setWeightStdDev(0.0125);
        $pokemonMeta->setCylHeightM(0.8);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.6);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.6);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SUCKER_PUNCH_FAST,
            PokemonMove::LICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::DARK_PULSE,
            PokemonMove::OMINOUS_WIND,
        )));
        $pokemonMeta->setNumber(92);
        self::$POKEMON_META[PokemonId::GASTLY] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0093_POKEMON_HAUNTER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GASTLY);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(90);
        $pokemonMeta->setCylRadiusM(0.51);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(172);
        $pokemonMeta->setDiskRadiusM(0.765);
        $pokemonMeta->setCollisionRadiusM(0.442);
        $pokemonMeta->setPokedexWeightKg(0.1);
        $pokemonMeta->setMovementType(MovementType::PSYCHIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GHOST);
        $pokemonMeta->setCollisionHeadRadiusM(0.442);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.68);
        $pokemonMeta->setUniqueId("V0093_POKEMON_HAUNTER");
        $pokemonMeta->setBaseDefense(118);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(0.0125);
        $pokemonMeta->setCylHeightM(1.088);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(1.156);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::GASTLY);
        $pokemonMeta->setCylGroundM(0.34);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SHADOW_CLAW_FAST,
            PokemonMove::LICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::SHADOW_BALL,
            PokemonMove::DARK_PULSE,
        )));
        $pokemonMeta->setNumber(93);
        self::$POKEMON_META[PokemonId::HAUNTER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0094_POKEMON_GENGAR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GASTLY);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.462);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(204);
        $pokemonMeta->setDiskRadiusM(0.693);
        $pokemonMeta->setCollisionRadiusM(0.462);
        $pokemonMeta->setPokedexWeightKg(40.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GHOST);
        $pokemonMeta->setCollisionHeadRadiusM(0.504);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1.3);
        $pokemonMeta->setModelScale(0.84);
        $pokemonMeta->setUniqueId("V0094_POKEMON_GENGAR");
        $pokemonMeta->setBaseDefense(156);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(5.0625);
        $pokemonMeta->setCylHeightM(1.176);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.092);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::HAUNTER);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SUCKER_PUNCH_FAST,
            PokemonMove::SHADOW_CLAW_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SHADOW_BALL,
            PokemonMove::DARK_PULSE,
            PokemonMove::SLUDGE_WAVE,
        )));
        $pokemonMeta->setNumber(94);
        self::$POKEMON_META[PokemonId::GENGAR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0095_POKEMON_ONIX");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ONIX);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setPokedexHeightM(8.8);
        $pokemonMeta->setHeightStdDev(1.1);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.658);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(90);
        $pokemonMeta->setDiskRadiusM(0.987);
        $pokemonMeta->setCollisionRadiusM(0.658);
        $pokemonMeta->setPokedexWeightKg(210);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.376);
        $pokemonMeta->setMovementTimerS(17);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.47);
        $pokemonMeta->setUniqueId("V0095_POKEMON_ONIX");
        $pokemonMeta->setBaseDefense(186);
        $pokemonMeta->setAttackTimerS(6);
        $pokemonMeta->setWeightStdDev(26.25);
        $pokemonMeta->setCylHeightM(1.41);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.175);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ROCK_THROW_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::IRON_HEAD,
            PokemonMove::STONE_EDGE,
            PokemonMove::ROCK_SLIDE,
        )));
        $pokemonMeta->setNumber(95);
        self::$POKEMON_META[PokemonId::ONIX] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0096_POKEMON_DROWZEE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DROWZEE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.42);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(104);
        $pokemonMeta->setDiskRadiusM(0.63);
        $pokemonMeta->setCollisionRadiusM(0.3675);
        $pokemonMeta->setPokedexWeightKg(32.4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.2625);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1.05);
        $pokemonMeta->setUniqueId("V0096_POKEMON_DROWZEE");
        $pokemonMeta->setBaseDefense(140);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(4.05);
        $pokemonMeta->setCylHeightM(1.05);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.63);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::POUND_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::PSYSHOCK,
            PokemonMove::PSYBEAM,
        )));
        $pokemonMeta->setNumber(96);
        self::$POKEMON_META[PokemonId::DROWZEE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0097_POKEMON_HYPNO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DROWZEE);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(170);
        $pokemonMeta->setCylRadiusM(0.6225);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(162);
        $pokemonMeta->setDiskRadiusM(0.9338);
        $pokemonMeta->setCollisionRadiusM(0.332);
        $pokemonMeta->setPokedexWeightKg(75.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.332);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(0.8);
        $pokemonMeta->setModelScale(0.83);
        $pokemonMeta->setUniqueId("V0097_POKEMON_HYPNO");
        $pokemonMeta->setBaseDefense(196);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(9.45);
        $pokemonMeta->setCylHeightM(1.328);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.83);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::DROWZEE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::SHADOW_BALL,
            PokemonMove::PSYSHOCK,
        )));
        $pokemonMeta->setNumber(97);
        self::$POKEMON_META[PokemonId::HYPNO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0098_POKEMON_KRABBY");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KRABBY);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.522);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(116);
        $pokemonMeta->setDiskRadiusM(0.783);
        $pokemonMeta->setCollisionRadiusM(0.522);
        $pokemonMeta->setPokedexWeightKg(6.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.261);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.16);
        $pokemonMeta->setUniqueId("V0098_POKEMON_KRABBY");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(0.8125);
        $pokemonMeta->setCylHeightM(0.87);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.87);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::WATER_PULSE,
            PokemonMove::VICE_GRIP,
            PokemonMove::BUBBLE_BEAM,
        )));
        $pokemonMeta->setNumber(98);
        self::$POKEMON_META[PokemonId::KRABBY] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0099_POKEMON_KINGLER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KRABBY);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.6525);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(178);
        $pokemonMeta->setDiskRadiusM(0.9788);
        $pokemonMeta->setCollisionRadiusM(0.6525);
        $pokemonMeta->setPokedexWeightKg(60);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.32625);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(0.8);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0099_POKEMON_KINGLER");
        $pokemonMeta->setBaseDefense(168);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(7.5);
        $pokemonMeta->setCylHeightM(1.0005);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.0005);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::KRABBY);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::METAL_CLAW_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::WATER_PULSE,
            PokemonMove::X_SCISSOR,
            PokemonMove::VICE_GRIP,
        )));
        $pokemonMeta->setNumber(99);
        self::$POKEMON_META[PokemonId::KINGLER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0100_POKEMON_VOLTORB");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_VOLTORB);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.3375);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(102);
        $pokemonMeta->setDiskRadiusM(0.5063);
        $pokemonMeta->setCollisionRadiusM(0.3375);
        $pokemonMeta->setPokedexWeightKg(10.4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.16875);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(1.35);
        $pokemonMeta->setUniqueId("V0100_POKEMON_VOLTORB");
        $pokemonMeta->setBaseDefense(124);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(1.3);
        $pokemonMeta->setCylHeightM(0.675);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.675);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SPARK_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SIGNAL_BEAM,
            PokemonMove::THUNDERBOLT,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(100);
        self::$POKEMON_META[PokemonId::VOLTORB] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0101_POKEMON_ELECTRODE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_VOLTORB);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.552);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(150);
        $pokemonMeta->setDiskRadiusM(0.828);
        $pokemonMeta->setCollisionRadiusM(0.552);
        $pokemonMeta->setPokedexWeightKg(66.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.276);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(0.92);
        $pokemonMeta->setUniqueId("V0101_POKEMON_ELECTRODE");
        $pokemonMeta->setBaseDefense(174);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(8.325);
        $pokemonMeta->setCylHeightM(1.104);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.104);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::VOLTORB);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SPARK_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::HYPER_BEAM,
            PokemonMove::THUNDERBOLT,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(101);
        self::$POKEMON_META[PokemonId::ELECTRODE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0102_POKEMON_EXEGGCUTE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EXEGGCUTE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.515);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(110);
        $pokemonMeta->setDiskRadiusM(0.7725);
        $pokemonMeta->setCollisionRadiusM(0.515);
        $pokemonMeta->setPokedexWeightKg(2.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.2575);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.03);
        $pokemonMeta->setUniqueId("V0102_POKEMON_EXEGGCUTE");
        $pokemonMeta->setBaseDefense(132);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.3125);
        $pokemonMeta->setCylHeightM(0.412);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.412);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::SEED_BOMB,
            PokemonMove::ANCIENT_POWER,
        )));
        $pokemonMeta->setNumber(102);
        self::$POKEMON_META[PokemonId::EXEGGCUTE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0103_POKEMON_EXEGGUTOR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EXEGGCUTE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setPokedexHeightM(2);
        $pokemonMeta->setHeightStdDev(0.25);
        $pokemonMeta->setBaseStamina(190);
        $pokemonMeta->setCylRadiusM(0.507);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(232);
        $pokemonMeta->setDiskRadiusM(0.7605);
        $pokemonMeta->setCollisionRadiusM(0.507);
        $pokemonMeta->setPokedexWeightKg(120);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.2535);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.78);
        $pokemonMeta->setUniqueId("V0103_POKEMON_EXEGGUTOR");
        $pokemonMeta->setBaseDefense(164);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(15);
        $pokemonMeta->setCylHeightM(1.365);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.365);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::EXEGGCUTE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::SEED_BOMB,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(103);
        self::$POKEMON_META[PokemonId::EXEGGUTOR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0104_POKEMON_CUBONE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CUBONE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.296);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(102);
        $pokemonMeta->setDiskRadiusM(0.444);
        $pokemonMeta->setCollisionRadiusM(0.222);
        $pokemonMeta->setPokedexWeightKg(6.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.222);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.48);
        $pokemonMeta->setUniqueId("V0104_POKEMON_CUBONE");
        $pokemonMeta->setBaseDefense(150);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.8125);
        $pokemonMeta->setCylHeightM(0.592);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.37);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SLAP_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::BONE_CLUB,
            PokemonMove::BULLDOZE,
        )));
        $pokemonMeta->setNumber(104);
        self::$POKEMON_META[PokemonId::CUBONE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0105_POKEMON_MAROWAK");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CUBONE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.35);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(140);
        $pokemonMeta->setDiskRadiusM(0.525);
        $pokemonMeta->setCollisionRadiusM(0.25);
        $pokemonMeta->setPokedexWeightKg(45);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.25);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(0.85);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0105_POKEMON_MAROWAK");
        $pokemonMeta->setBaseDefense(202);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(5.625);
        $pokemonMeta->setCylHeightM(1);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.75);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::CUBONE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SLAP_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::EARTHQUAKE,
            PokemonMove::BONE_CLUB,
        )));
        $pokemonMeta->setNumber(105);
        self::$POKEMON_META[PokemonId::MAROWAK] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0106_POKEMON_HITMONLEE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_HITMONLEE);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.415);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(148);
        $pokemonMeta->setDiskRadiusM(0.6225);
        $pokemonMeta->setCollisionRadiusM(0.415);
        $pokemonMeta->setPokedexWeightKg(49.8);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.2075);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(0.8);
        $pokemonMeta->setModelScale(0.83);
        $pokemonMeta->setUniqueId("V0106_POKEMON_HITMONLEE");
        $pokemonMeta->setBaseDefense(172);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(6.225);
        $pokemonMeta->setCylHeightM(1.245);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.245);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::LOW_KICK_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STOMP,
            PokemonMove::STONE_EDGE,
            PokemonMove::LOW_SWEEP,
        )));
        $pokemonMeta->setNumber(106);
        self::$POKEMON_META[PokemonId::HITMONLEE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0107_POKEMON_HITMONCHAN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_HITMONCHAN);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.4);
        $pokemonMeta->setHeightStdDev(0.175);
        $pokemonMeta->setBaseStamina(100);
        $pokemonMeta->setCylRadiusM(0.459);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(138);
        $pokemonMeta->setDiskRadiusM(0.6885);
        $pokemonMeta->setCollisionRadiusM(0.3315);
        $pokemonMeta->setPokedexWeightKg(50.2);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIGHTING);
        $pokemonMeta->setCollisionHeadRadiusM(0.255);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1.1);
        $pokemonMeta->setModelScale(1.02);
        $pokemonMeta->setUniqueId("V0107_POKEMON_HITMONCHAN");
        $pokemonMeta->setBaseDefense(204);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(6.275);
        $pokemonMeta->setCylHeightM(1.428);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.02);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BULLET_PUNCH_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER_PUNCH,
            PokemonMove::FIRE_PUNCH,
            PokemonMove::BRICK_BREAK,
            PokemonMove::ICE_PUNCH,
        )));
        $pokemonMeta->setNumber(107);
        self::$POKEMON_META[PokemonId::HITMONCHAN] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0108_POKEMON_LICKITUNG");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_LICKITUNG);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.46);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(126);
        $pokemonMeta->setDiskRadiusM(0.69);
        $pokemonMeta->setCollisionRadiusM(0.46);
        $pokemonMeta->setPokedexWeightKg(65.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.253);
        $pokemonMeta->setMovementTimerS(23);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.92);
        $pokemonMeta->setUniqueId("V0108_POKEMON_LICKITUNG");
        $pokemonMeta->setBaseDefense(160);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(8.1875);
        $pokemonMeta->setCylHeightM(1.104);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.92);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ZEN_HEADBUTT_FAST,
            PokemonMove::LICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STOMP,
            PokemonMove::POWER_WHIP,
            PokemonMove::HYPER_BEAM,
        )));
        $pokemonMeta->setNumber(108);
        self::$POKEMON_META[PokemonId::LICKITUNG] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0109_POKEMON_KOFFING");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KOFFING);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.48);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(136);
        $pokemonMeta->setDiskRadiusM(0.72);
        $pokemonMeta->setCollisionRadiusM(0.36);
        $pokemonMeta->setPokedexWeightKg(1);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.6);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.2);
        $pokemonMeta->setUniqueId("V0109_POKEMON_KOFFING");
        $pokemonMeta->setBaseDefense(142);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.125);
        $pokemonMeta->setCylHeightM(0.72);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.66);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.6);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::DARK_PULSE,
            PokemonMove::SLUDGE,
        )));
        $pokemonMeta->setNumber(109);
        self::$POKEMON_META[PokemonId::KOFFING] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0110_POKEMON_WEEZING");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KOFFING);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.62);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(190);
        $pokemonMeta->setDiskRadiusM(0.93);
        $pokemonMeta->setCollisionRadiusM(0.682);
        $pokemonMeta->setPokedexWeightKg(9.5);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_POISON);
        $pokemonMeta->setCollisionHeadRadiusM(0.465);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.24);
        $pokemonMeta->setUniqueId("V0110_POKEMON_WEEZING");
        $pokemonMeta->setBaseDefense(198);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(1.1875);
        $pokemonMeta->setCylHeightM(0.744);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.744);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::KOFFING);
        $pokemonMeta->setCylGroundM(0.62);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ACID_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::SHADOW_BALL,
            PokemonMove::DARK_PULSE,
        )));
        $pokemonMeta->setNumber(110);
        self::$POKEMON_META[PokemonId::WEEZING] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0111_POKEMON_RHYHORN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_RHYHORN);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.5);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(110);
        $pokemonMeta->setDiskRadiusM(0.75);
        $pokemonMeta->setCollisionRadiusM(0.5);
        $pokemonMeta->setPokedexWeightKg(115);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.3);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0111_POKEMON_RHYHORN");
        $pokemonMeta->setBaseDefense(116);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(14.375);
        $pokemonMeta->setCylHeightM(0.85);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.85);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SLAP_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STOMP,
            PokemonMove::BULLDOZE,
            PokemonMove::HORN_ATTACK,
        )));
        $pokemonMeta->setNumber(111);
        self::$POKEMON_META[PokemonId::RHYHORN] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0112_POKEMON_RHYDON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_RHYHORN);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setPokedexHeightM(1.9);
        $pokemonMeta->setHeightStdDev(0.2375);
        $pokemonMeta->setBaseStamina(210);
        $pokemonMeta->setCylRadiusM(0.79);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(166);
        $pokemonMeta->setDiskRadiusM(1.185);
        $pokemonMeta->setCollisionRadiusM(0.5925);
        $pokemonMeta->setPokedexWeightKg(120);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GROUND);
        $pokemonMeta->setCollisionHeadRadiusM(0.395);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.79);
        $pokemonMeta->setUniqueId("V0112_POKEMON_RHYDON");
        $pokemonMeta->setBaseDefense(160);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(15);
        $pokemonMeta->setCylHeightM(1.343);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.185);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::RHYHORN);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SLAP_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STONE_EDGE,
            PokemonMove::EARTHQUAKE,
            PokemonMove::MEGAHORN,
        )));
        $pokemonMeta->setNumber(112);
        self::$POKEMON_META[PokemonId::RHYDON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0113_POKEMON_CHANSEY");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_CHANSEY);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(500);
        $pokemonMeta->setCylRadiusM(0.48);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(40);
        $pokemonMeta->setDiskRadiusM(0.72);
        $pokemonMeta->setCollisionRadiusM(0.48);
        $pokemonMeta->setPokedexWeightKg(34.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.24);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.96);
        $pokemonMeta->setUniqueId("V0113_POKEMON_CHANSEY");
        $pokemonMeta->setBaseDefense(60);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(4.325);
        $pokemonMeta->setCylHeightM(1.056);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.056);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::DAZZLING_GLEAM,
            PokemonMove::PSYBEAM,
        )));
        $pokemonMeta->setNumber(113);
        self::$POKEMON_META[PokemonId::CHANSEY] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0114_POKEMON_TANGELA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_TANGELA);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.73);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(164);
        $pokemonMeta->setDiskRadiusM(1.095);
        $pokemonMeta->setCollisionRadiusM(0.5);
        $pokemonMeta->setPokedexWeightKg(35);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_GRASS);
        $pokemonMeta->setCollisionHeadRadiusM(0.365);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0114_POKEMON_TANGELA");
        $pokemonMeta->setBaseDefense(152);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(4.375);
        $pokemonMeta->setCylHeightM(1);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.9);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::VINE_WHIP_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POWER_WHIP,
            PokemonMove::SLUDGE_BOMB,
            PokemonMove::SOLAR_BEAM,
        )));
        $pokemonMeta->setNumber(114);
        self::$POKEMON_META[PokemonId::TANGELA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0115_POKEMON_KANGASKHAN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KANGASKHAN);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(2.2);
        $pokemonMeta->setHeightStdDev(0.275);
        $pokemonMeta->setBaseStamina(210);
        $pokemonMeta->setCylRadiusM(0.576);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(142);
        $pokemonMeta->setDiskRadiusM(0.864);
        $pokemonMeta->setCollisionRadiusM(0.504);
        $pokemonMeta->setPokedexWeightKg(80);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.36);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(0.7);
        $pokemonMeta->setModelScale(0.72);
        $pokemonMeta->setUniqueId("V0115_POKEMON_KANGASKHAN");
        $pokemonMeta->setBaseDefense(178);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(10);
        $pokemonMeta->setCylHeightM(1.584);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.26);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SLAP_FAST,
            PokemonMove::LOW_KICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STOMP,
            PokemonMove::EARTHQUAKE,
            PokemonMove::BRICK_BREAK,
        )));
        $pokemonMeta->setNumber(115);
        self::$POKEMON_META[PokemonId::KANGASKHAN] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0116_POKEMON_HORSEA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_HORSEA);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.25);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(122);
        $pokemonMeta->setDiskRadiusM(0.2775);
        $pokemonMeta->setCollisionRadiusM(0.148);
        $pokemonMeta->setPokedexWeightKg(8);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.185);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.48);
        $pokemonMeta->setUniqueId("V0116_POKEMON_HORSEA");
        $pokemonMeta->setBaseDefense(100);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(1);
        $pokemonMeta->setCylHeightM(0.74);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.444);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.185);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WATER_GUN_FAST,
            PokemonMove::BUBBLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLASH_CANNON,
            PokemonMove::BUBBLE_BEAM,
            PokemonMove::DRAGON_PULSE,
        )));
        $pokemonMeta->setNumber(116);
        self::$POKEMON_META[PokemonId::HORSEA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0117_POKEMON_SEADRA");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_HORSEA);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.2);
        $pokemonMeta->setHeightStdDev(0.15);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.46);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(176);
        $pokemonMeta->setDiskRadiusM(0.69);
        $pokemonMeta->setCollisionRadiusM(0.322);
        $pokemonMeta->setPokedexWeightKg(25);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.414);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.92);
        $pokemonMeta->setUniqueId("V0117_POKEMON_SEADRA");
        $pokemonMeta->setBaseDefense(150);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(3.125);
        $pokemonMeta->setCylHeightM(1.15);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.46);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::HORSEA);
        $pokemonMeta->setCylGroundM(0.46);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::DRAGON_BREATH_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BLIZZARD,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::DRAGON_PULSE,
        )));
        $pokemonMeta->setNumber(117);
        self::$POKEMON_META[PokemonId::SEADRA] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0118_POKEMON_GOLDEEN");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GOLDEEN);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.6);
        $pokemonMeta->setHeightStdDev(0.075);
        $pokemonMeta->setBaseStamina(90);
        $pokemonMeta->setCylRadiusM(0.27);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(112);
        $pokemonMeta->setDiskRadiusM(0.405);
        $pokemonMeta->setCollisionRadiusM(0.135);
        $pokemonMeta->setPokedexWeightKg(15);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.16875);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.35);
        $pokemonMeta->setUniqueId("V0118_POKEMON_GOLDEEN");
        $pokemonMeta->setBaseDefense(126);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(1.875);
        $pokemonMeta->setCylHeightM(0.3375);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.16875);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.3375);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::PECK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::WATER_PULSE,
            PokemonMove::HORN_ATTACK,
            PokemonMove::AQUA_TAIL,
        )));
        $pokemonMeta->setNumber(118);
        self::$POKEMON_META[PokemonId::GOLDEEN] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0119_POKEMON_SEAKING");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_GOLDEEN);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.396);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(172);
        $pokemonMeta->setDiskRadiusM(0.594);
        $pokemonMeta->setCollisionRadiusM(0.044);
        $pokemonMeta->setPokedexWeightKg(39);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.242);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.88);
        $pokemonMeta->setUniqueId("V0119_POKEMON_SEAKING");
        $pokemonMeta->setBaseDefense(160);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(4.875);
        $pokemonMeta->setCylHeightM(0.748);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.044);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::GOLDEEN);
        $pokemonMeta->setCylGroundM(0.33);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POISON_JAB_FAST,
            PokemonMove::PECK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICY_WIND,
            PokemonMove::MEGAHORN,
            PokemonMove::DRILL_RUN,
        )));
        $pokemonMeta->setNumber(119);
        self::$POKEMON_META[PokemonId::SEAKING] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0120_POKEMON_STARYU");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_STARYU);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.4125);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(130);
        $pokemonMeta->setDiskRadiusM(0.6188);
        $pokemonMeta->setCollisionRadiusM(0.4125);
        $pokemonMeta->setPokedexWeightKg(34.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.20625);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.35);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0120_POKEMON_STARYU");
        $pokemonMeta->setBaseDefense(128);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(4.3125);
        $pokemonMeta->setCylHeightM(0.88000011);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.88000011);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.4);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WATER_GUN_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::POWER_GEM,
            PokemonMove::BUBBLE_BEAM,
            PokemonMove::SWIFT,
        )));
        $pokemonMeta->setNumber(120);
        self::$POKEMON_META[PokemonId::STARYU] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0121_POKEMON_STARMIE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_STARYU);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.485);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(194);
        $pokemonMeta->setDiskRadiusM(0.7275);
        $pokemonMeta->setCollisionRadiusM(0.485);
        $pokemonMeta->setPokedexWeightKg(80);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.2425);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1.6);
        $pokemonMeta->setModelScale(0.97);
        $pokemonMeta->setUniqueId("V0121_POKEMON_STARMIE");
        $pokemonMeta->setBaseDefense(192);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(10);
        $pokemonMeta->setCylHeightM(1.067);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.067);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::STARYU);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WATER_GUN_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYBEAM,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::POWER_GEM,
        )));
        $pokemonMeta->setNumber(121);
        self::$POKEMON_META[PokemonId::STARMIE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0122_POKEMON_MR_MIME");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MR_MIME);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FAIRY);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(80);
        $pokemonMeta->setCylRadiusM(0.445);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(154);
        $pokemonMeta->setDiskRadiusM(0.6675);
        $pokemonMeta->setCollisionRadiusM(0.267);
        $pokemonMeta->setPokedexWeightKg(54.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.267);
        $pokemonMeta->setMovementTimerS(5);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.89);
        $pokemonMeta->setUniqueId("V0122_POKEMON_MR_MIME");
        $pokemonMeta->setBaseDefense(196);
        $pokemonMeta->setAttackTimerS(14);
        $pokemonMeta->setWeightStdDev(6.8125);
        $pokemonMeta->setCylHeightM(1.157);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.6675);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::ZEN_HEADBUTT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::SHADOW_BALL,
            PokemonMove::PSYBEAM,
        )));
        $pokemonMeta->setNumber(122);
        self::$POKEMON_META[PokemonId::MR_MIME] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0123_POKEMON_SCYTHER");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SCYTHER);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(140);
        $pokemonMeta->setCylRadiusM(0.76);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(176);
        $pokemonMeta->setDiskRadiusM(1.14);
        $pokemonMeta->setCollisionRadiusM(0.4);
        $pokemonMeta->setPokedexWeightKg(56);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.2);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.8);
        $pokemonMeta->setUniqueId("V0123_POKEMON_SCYTHER");
        $pokemonMeta->setBaseDefense(180);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(7);
        $pokemonMeta->setCylHeightM(1.2);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.4);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::STEEL_WING_FAST,
            PokemonMove::FURY_CUTTER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BUG_BUZZ,
            PokemonMove::X_SCISSOR,
            PokemonMove::NIGHT_SLASH,
        )));
        $pokemonMeta->setNumber(123);
        self::$POKEMON_META[PokemonId::SCYTHER] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0124_POKEMON_JYNX");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_JYNX);
        $pokemonMeta->setPokemonClass(PokemonClass::COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setPokedexHeightM(1.4);
        $pokemonMeta->setHeightStdDev(0.175);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.6525);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(172);
        $pokemonMeta->setDiskRadiusM(0.9788);
        $pokemonMeta->setCollisionRadiusM(0.435);
        $pokemonMeta->setPokedexWeightKg(40.6);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ICE);
        $pokemonMeta->setCollisionHeadRadiusM(0.522);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0124_POKEMON_JYNX");
        $pokemonMeta->setBaseDefense(134);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(5.075);
        $pokemonMeta->setCylHeightM(1.218);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.87);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
            PokemonMove::FROST_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYSHOCK,
            PokemonMove::DRAINING_KISS,
            PokemonMove::ICE_PUNCH,
        )));
        $pokemonMeta->setNumber(124);
        self::$POKEMON_META[PokemonId::JYNX] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0125_POKEMON_ELECTABUZZ");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ELECTABUZZ);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.1);
        $pokemonMeta->setHeightStdDev(0.1375);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.5635);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(198);
        $pokemonMeta->setDiskRadiusM(0.8453);
        $pokemonMeta->setCollisionRadiusM(0.392);
        $pokemonMeta->setPokedexWeightKg(30);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.28175);
        $pokemonMeta->setMovementTimerS(6);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.98);
        $pokemonMeta->setUniqueId("V0125_POKEMON_ELECTABUZZ");
        $pokemonMeta->setBaseDefense(160);
        $pokemonMeta->setAttackTimerS(17);
        $pokemonMeta->setWeightStdDev(3.75);
        $pokemonMeta->setCylHeightM(0.98);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.735);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::LOW_KICK_FAST,
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER_PUNCH,
            PokemonMove::THUNDER,
            PokemonMove::THUNDERBOLT,
        )));
        $pokemonMeta->setNumber(125);
        self::$POKEMON_META[PokemonId::ELECTABUZZ] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0126_POKEMON_MAGMAR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MAGMAR);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.66);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(214);
        $pokemonMeta->setDiskRadiusM(0.99);
        $pokemonMeta->setCollisionRadiusM(0.44);
        $pokemonMeta->setPokedexWeightKg(44.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.33);
        $pokemonMeta->setMovementTimerS(14);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.88);
        $pokemonMeta->setUniqueId("V0126_POKEMON_MAGMAR");
        $pokemonMeta->setBaseDefense(158);
        $pokemonMeta->setAttackTimerS(5);
        $pokemonMeta->setWeightStdDev(5.5625);
        $pokemonMeta->setCylHeightM(1.144);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.88);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::KARATE_CHOP_FAST,
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FIRE_PUNCH,
            PokemonMove::FLAMETHROWER,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(126);
        self::$POKEMON_META[PokemonId::MAGMAR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0127_POKEMON_PINSIR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PINSIR);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.5);
        $pokemonMeta->setHeightStdDev(0.1875);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.348);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(184);
        $pokemonMeta->setDiskRadiusM(0.522);
        $pokemonMeta->setCollisionRadiusM(0.348);
        $pokemonMeta->setPokedexWeightKg(55);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_BUG);
        $pokemonMeta->setCollisionHeadRadiusM(0.348);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0127_POKEMON_PINSIR");
        $pokemonMeta->setBaseDefense(186);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(6.875);
        $pokemonMeta->setCylHeightM(1.131);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.87);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::FURY_CUTTER_FAST,
            PokemonMove::ROCK_SMASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::SUBMISSION,
            PokemonMove::X_SCISSOR,
            PokemonMove::VICE_GRIP,
        )));
        $pokemonMeta->setNumber(127);
        self::$POKEMON_META[PokemonId::PINSIR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0128_POKEMON_TAUROS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_TAUROS);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.4);
        $pokemonMeta->setHeightStdDev(0.175);
        $pokemonMeta->setBaseStamina(150);
        $pokemonMeta->setCylRadiusM(0.5742);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(148);
        $pokemonMeta->setDiskRadiusM(0.8613);
        $pokemonMeta->setCollisionRadiusM(0.435);
        $pokemonMeta->setPokedexWeightKg(88.4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.2871);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0128_POKEMON_TAUROS");
        $pokemonMeta->setBaseDefense(184);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(11.05);
        $pokemonMeta->setCylHeightM(1.19625);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.19625);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.24);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ZEN_HEADBUTT_FAST,
            PokemonMove::TACKLE_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::IRON_HEAD,
            PokemonMove::EARTHQUAKE,
            PokemonMove::HORN_ATTACK,
        )));
        $pokemonMeta->setNumber(128);
        self::$POKEMON_META[PokemonId::TAUROS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0129_POKEMON_MAGIKARP");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MAGIKARP);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.9);
        $pokemonMeta->setHeightStdDev(0.1125);
        $pokemonMeta->setBaseStamina(40);
        $pokemonMeta->setCylRadiusM(0.428);
        $pokemonMeta->setBaseFleeRate(0.15);
        $pokemonMeta->setBaseAttack(42);
        $pokemonMeta->setDiskRadiusM(0.642);
        $pokemonMeta->setCollisionRadiusM(0.2675);
        $pokemonMeta->setPokedexWeightKg(10);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.321);
        $pokemonMeta->setMovementTimerS(3600);
        $pokemonMeta->setJumpTimeS(1.3);
        $pokemonMeta->setModelScale(1.07);
        $pokemonMeta->setUniqueId("V0129_POKEMON_MAGIKARP");
        $pokemonMeta->setBaseDefense(84);
        $pokemonMeta->setAttackTimerS(3600);
        $pokemonMeta->setWeightStdDev(1.25);
        $pokemonMeta->setCylHeightM(0.535);
        $pokemonMeta->setCandyToEvolve(400);
        $pokemonMeta->setCollisionHeightM(0.4815);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.56);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::SPLASH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STRUGGLE,
        )));
        $pokemonMeta->setNumber(129);
        self::$POKEMON_META[PokemonId::MAGIKARP] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0130_POKEMON_GYARADOS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MAGIKARP);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(6.5);
        $pokemonMeta->setHeightStdDev(0.8125);
        $pokemonMeta->setBaseStamina(190);
        $pokemonMeta->setCylRadiusM(0.48);
        $pokemonMeta->setBaseFleeRate(0.07);
        $pokemonMeta->setBaseAttack(192);
        $pokemonMeta->setDiskRadiusM(0.72);
        $pokemonMeta->setCollisionRadiusM(0.24);
        $pokemonMeta->setPokedexWeightKg(235);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.36);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.48);
        $pokemonMeta->setUniqueId("V0130_POKEMON_GYARADOS");
        $pokemonMeta->setBaseDefense(196);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(29.375);
        $pokemonMeta->setCylHeightM(1.2);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.48);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::MAGIKARP);
        $pokemonMeta->setCylGroundM(0.48);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::DRAGON_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::TWISTER,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::DRAGON_PULSE,
        )));
        $pokemonMeta->setNumber(130);
        self::$POKEMON_META[PokemonId::GYARADOS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0131_POKEMON_LAPRAS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_LAPRAS);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_ICE);
        $pokemonMeta->setPokedexHeightM(2.5);
        $pokemonMeta->setHeightStdDev(0.3125);
        $pokemonMeta->setBaseStamina(260);
        $pokemonMeta->setCylRadiusM(0.7);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(186);
        $pokemonMeta->setDiskRadiusM(1.05);
        $pokemonMeta->setCollisionRadiusM(0.525);
        $pokemonMeta->setPokedexWeightKg(220);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.35);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(0.7);
        $pokemonMeta->setUniqueId("V0131_POKEMON_LAPRAS");
        $pokemonMeta->setBaseDefense(190);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(27.5);
        $pokemonMeta->setCylHeightM(1.75);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.7);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ICE_SHARD_FAST,
            PokemonMove::FROST_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::BLIZZARD,
            PokemonMove::ICE_BEAM,
            PokemonMove::DRAGON_PULSE,
        )));
        $pokemonMeta->setNumber(131);
        self::$POKEMON_META[PokemonId::LAPRAS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0132_POKEMON_DITTO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DITTO);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(96);
        $pokemonMeta->setCylRadiusM(0.4025);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(110);
        $pokemonMeta->setDiskRadiusM(0.6038);
        $pokemonMeta->setCollisionRadiusM(0.4025);
        $pokemonMeta->setPokedexWeightKg(4);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.20125);
        $pokemonMeta->setMovementTimerS(3600);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.61);
        $pokemonMeta->setUniqueId("V0132_POKEMON_DITTO");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(3600);
        $pokemonMeta->setWeightStdDev(0.5);
        $pokemonMeta->setCylHeightM(0.52325);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.52325);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STRUGGLE,
        )));
        $pokemonMeta->setNumber(132);
        self::$POKEMON_META[PokemonId::DITTO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0133_POKEMON_EEVEE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EEVEE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_COMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.3);
        $pokemonMeta->setHeightStdDev(0.0375);
        $pokemonMeta->setBaseStamina(110);
        $pokemonMeta->setCylRadiusM(0.42);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(114);
        $pokemonMeta->setDiskRadiusM(0.63);
        $pokemonMeta->setCollisionRadiusM(0.252);
        $pokemonMeta->setPokedexWeightKg(6.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.252);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(1.35);
        $pokemonMeta->setModelScale(1.68);
        $pokemonMeta->setUniqueId("V0133_POKEMON_EEVEE");
        $pokemonMeta->setBaseDefense(128);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.8125);
        $pokemonMeta->setCylHeightM(0.504);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.336);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::TACKLE_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DIG,
            PokemonMove::SWIFT,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(133);
        self::$POKEMON_META[PokemonId::EEVEE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0134_POKEMON_VAPOREON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EEVEE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(260);
        $pokemonMeta->setCylRadiusM(0.3465);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(186);
        $pokemonMeta->setDiskRadiusM(0.5198);
        $pokemonMeta->setCollisionRadiusM(0.21);
        $pokemonMeta->setPokedexWeightKg(29);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setCollisionHeadRadiusM(0.2625);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.05);
        $pokemonMeta->setUniqueId("V0134_POKEMON_VAPOREON");
        $pokemonMeta->setBaseDefense(168);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(3.625);
        $pokemonMeta->setCylHeightM(0.94499987);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.525);
        $pokemonMeta->setShoulderModeScale(0.4);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::EEVEE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::WATER_PULSE,
            PokemonMove::HYDRO_PUMP,
            PokemonMove::AQUA_TAIL,
        )));
        $pokemonMeta->setNumber(134);
        self::$POKEMON_META[PokemonId::VAPOREON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0135_POKEMON_JOLTEON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EEVEE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.33);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(192);
        $pokemonMeta->setDiskRadiusM(0.495);
        $pokemonMeta->setCollisionRadiusM(0.22);
        $pokemonMeta->setPokedexWeightKg(24.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.22);
        $pokemonMeta->setMovementTimerS(4);
        $pokemonMeta->setJumpTimeS(1.3);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0135_POKEMON_JOLTEON");
        $pokemonMeta->setBaseDefense(174);
        $pokemonMeta->setAttackTimerS(11);
        $pokemonMeta->setWeightStdDev(3.0625);
        $pokemonMeta->setCylHeightM(0.88000011);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.55);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::EEVEE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER,
            PokemonMove::THUNDERBOLT,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(135);
        self::$POKEMON_META[PokemonId::JOLTEON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0136_POKEMON_FLAREON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_EEVEE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.9);
        $pokemonMeta->setHeightStdDev(0.1125);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.3045);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(238);
        $pokemonMeta->setDiskRadiusM(0.4568);
        $pokemonMeta->setCollisionRadiusM(0.2175);
        $pokemonMeta->setPokedexWeightKg(25);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.19575);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1.35);
        $pokemonMeta->setModelScale(0.87);
        $pokemonMeta->setUniqueId("V0136_POKEMON_FLAREON");
        $pokemonMeta->setBaseDefense(178);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(3.125);
        $pokemonMeta->setCylHeightM(0.783);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.522);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::EEVEE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAMETHROWER,
            PokemonMove::HEAT_WAVE,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(136);
        self::$POKEMON_META[PokemonId::FLAREON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0137_POKEMON_PORYGON");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_PORYGON);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.8);
        $pokemonMeta->setHeightStdDev(0.1);
        $pokemonMeta->setBaseStamina(130);
        $pokemonMeta->setCylRadiusM(0.55);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(156);
        $pokemonMeta->setDiskRadiusM(0.825);
        $pokemonMeta->setCollisionRadiusM(0.385);
        $pokemonMeta->setPokedexWeightKg(36.5);
        $pokemonMeta->setMovementType(MovementType::HOVERING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.33);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.1);
        $pokemonMeta->setUniqueId("V0137_POKEMON_PORYGON");
        $pokemonMeta->setBaseDefense(158);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(4.5625);
        $pokemonMeta->setCylHeightM(0.93500012);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.55);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.55);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::TACKLE_FAST,
            PokemonMove::QUICK_ATTACK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DISCHARGE,
            PokemonMove::PSYBEAM,
            PokemonMove::SIGNAL_BEAM,
        )));
        $pokemonMeta->setNumber(137);
        self::$POKEMON_META[PokemonId::PORYGON] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0138_POKEMON_OMANYTE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_OMANYTE);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(70);
        $pokemonMeta->setCylRadiusM(0.222);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(132);
        $pokemonMeta->setDiskRadiusM(0.333);
        $pokemonMeta->setCollisionRadiusM(0.222);
        $pokemonMeta->setPokedexWeightKg(7.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.111);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.3);
        $pokemonMeta->setModelScale(1.48);
        $pokemonMeta->setUniqueId("V0138_POKEMON_OMANYTE");
        $pokemonMeta->setBaseDefense(160);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(0.9375);
        $pokemonMeta->setCylHeightM(0.592);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.592);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ROCK_TOMB,
            PokemonMove::ANCIENT_POWER,
            PokemonMove::BRINE,
        )));
        $pokemonMeta->setNumber(138);
        self::$POKEMON_META[PokemonId::OMANYTE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0139_POKEMON_OMASTAR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_OMANYTE);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setPokedexHeightM(1);
        $pokemonMeta->setHeightStdDev(0.125);
        $pokemonMeta->setBaseStamina(140);
        $pokemonMeta->setCylRadiusM(0.375);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(180);
        $pokemonMeta->setDiskRadiusM(0.5625);
        $pokemonMeta->setCollisionRadiusM(0.25);
        $pokemonMeta->setPokedexWeightKg(35);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.1875);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(1);
        $pokemonMeta->setUniqueId("V0139_POKEMON_OMASTAR");
        $pokemonMeta->setBaseDefense(202);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(4.375);
        $pokemonMeta->setCylHeightM(1);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.9);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::OMANYTE);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ROCK_THROW_FAST,
            PokemonMove::WATER_GUN_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::HYDRO_PUMP,
            PokemonMove::ANCIENT_POWER,
            PokemonMove::ROCK_SLIDE,
        )));
        $pokemonMeta->setNumber(139);
        self::$POKEMON_META[PokemonId::OMASTAR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0140_POKEMON_KABUTO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KABUTO);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setPokedexHeightM(0.5);
        $pokemonMeta->setHeightStdDev(0.0625);
        $pokemonMeta->setBaseStamina(60);
        $pokemonMeta->setCylRadiusM(0.3375);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(148);
        $pokemonMeta->setDiskRadiusM(0.5063);
        $pokemonMeta->setCollisionRadiusM(0.3375);
        $pokemonMeta->setPokedexWeightKg(11.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.16875);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(0.9);
        $pokemonMeta->setModelScale(1.35);
        $pokemonMeta->setUniqueId("V0140_POKEMON_KABUTO");
        $pokemonMeta->setBaseDefense(142);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(1.4375);
        $pokemonMeta->setCylHeightM(0.50625);
        $pokemonMeta->setCandyToEvolve(50);
        $pokemonMeta->setCollisionHeightM(0.50625);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::SCRATCH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ANCIENT_POWER,
            PokemonMove::AQUA_JET,
            PokemonMove::ROCK_TOMB,
        )));
        $pokemonMeta->setNumber(140);
        self::$POKEMON_META[PokemonId::KABUTO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0141_POKEMON_KABUTOPS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_KABUTO);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_WATER);
        $pokemonMeta->setPokedexHeightM(1.3);
        $pokemonMeta->setHeightStdDev(0.1625);
        $pokemonMeta->setBaseStamina(120);
        $pokemonMeta->setCylRadiusM(0.455);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(190);
        $pokemonMeta->setDiskRadiusM(0.6825);
        $pokemonMeta->setCollisionRadiusM(0.364);
        $pokemonMeta->setPokedexWeightKg(40.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.3185);
        $pokemonMeta->setMovementTimerS(11);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.91);
        $pokemonMeta->setUniqueId("V0141_POKEMON_KABUTOPS");
        $pokemonMeta->setBaseDefense(190);
        $pokemonMeta->setAttackTimerS(4);
        $pokemonMeta->setWeightStdDev(5.0625);
        $pokemonMeta->setCylHeightM(1.1375);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.91);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.12);
        $pokemonMeta->setParentId(PokemonId::KABUTO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::MUD_SHOT_FAST,
            PokemonMove::FURY_CUTTER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::STONE_EDGE,
            PokemonMove::WATER_PULSE,
            PokemonMove::ANCIENT_POWER,
        )));
        $pokemonMeta->setNumber(141);
        self::$POKEMON_META[PokemonId::KABUTOPS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0142_POKEMON_AERODACTYL");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_AERODACTYL);
        $pokemonMeta->setPokemonClass(PokemonClass::VERY_RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.8);
        $pokemonMeta->setHeightStdDev(0.225);
        $pokemonMeta->setBaseStamina(160);
        $pokemonMeta->setCylRadiusM(0.399);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(182);
        $pokemonMeta->setDiskRadiusM(0.5985);
        $pokemonMeta->setCollisionRadiusM(0.285);
        $pokemonMeta->setPokedexWeightKg(59);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ROCK);
        $pokemonMeta->setCollisionHeadRadiusM(0.285);
        $pokemonMeta->setMovementTimerS(5);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.57);
        $pokemonMeta->setUniqueId("V0142_POKEMON_AERODACTYL");
        $pokemonMeta->setBaseDefense(162);
        $pokemonMeta->setAttackTimerS(14);
        $pokemonMeta->setWeightStdDev(7.375);
        $pokemonMeta->setCylHeightM(0.9975);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.9975);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.855);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::BITE_FAST,
            PokemonMove::STEEL_WING_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::IRON_HEAD,
            PokemonMove::HYPER_BEAM,
            PokemonMove::ANCIENT_POWER,
        )));
        $pokemonMeta->setNumber(142);
        self::$POKEMON_META[PokemonId::AERODACTYL] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0143_POKEMON_SNORLAX");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_SNORLAX);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(2.1);
        $pokemonMeta->setHeightStdDev(0.2625);
        $pokemonMeta->setBaseStamina(320);
        $pokemonMeta->setCylRadiusM(0.74);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(180);
        $pokemonMeta->setDiskRadiusM(1.11);
        $pokemonMeta->setCollisionRadiusM(0.74);
        $pokemonMeta->setPokedexWeightKg(460);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_NORMAL);
        $pokemonMeta->setCollisionHeadRadiusM(0.481);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.74);
        $pokemonMeta->setUniqueId("V0143_POKEMON_SNORLAX");
        $pokemonMeta->setBaseDefense(180);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(57.5);
        $pokemonMeta->setCylHeightM(1.48);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.11);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.16);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::ZEN_HEADBUTT_FAST,
            PokemonMove::LICK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::EARTHQUAKE,
            PokemonMove::HYPER_BEAM,
            PokemonMove::BODY_SLAM,
        )));
        $pokemonMeta->setNumber(143);
        self::$POKEMON_META[PokemonId::SNORLAX] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0144_POKEMON_ARTICUNO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ARTICUNO);
        $pokemonMeta->setPokemonClass(PokemonClass::LEGENDARY);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.7);
        $pokemonMeta->setHeightStdDev(0.2125);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.396);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(198);
        $pokemonMeta->setDiskRadiusM(0.594);
        $pokemonMeta->setCollisionRadiusM(0.231);
        $pokemonMeta->setPokedexWeightKg(55.4);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ICE);
        $pokemonMeta->setCollisionHeadRadiusM(0.231);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.66);
        $pokemonMeta->setUniqueId("V0144_POKEMON_ARTICUNO");
        $pokemonMeta->setBaseDefense(242);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(6.925);
        $pokemonMeta->setCylHeightM(0.99);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.66);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.66);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::FROST_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::ICY_WIND,
            PokemonMove::BLIZZARD,
            PokemonMove::ICE_BEAM,
        )));
        $pokemonMeta->setNumber(144);
        self::$POKEMON_META[PokemonId::ARTICUNO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0145_POKEMON_ZAPDOS");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_ZAPDOS);
        $pokemonMeta->setPokemonClass(PokemonClass::LEGENDARY);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(1.6);
        $pokemonMeta->setHeightStdDev(0.2);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.5175);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(232);
        $pokemonMeta->setDiskRadiusM(0.7763);
        $pokemonMeta->setCollisionRadiusM(0.4485);
        $pokemonMeta->setPokedexWeightKg(52.6);
        $pokemonMeta->setMovementType(MovementType::ELECTRIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_ELECTRIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.276);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.69);
        $pokemonMeta->setUniqueId("V0145_POKEMON_ZAPDOS");
        $pokemonMeta->setBaseDefense(194);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(6.575);
        $pokemonMeta->setCylHeightM(1.035);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.759);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.8625);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER_SHOCK_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::THUNDER,
            PokemonMove::THUNDERBOLT,
            PokemonMove::DISCHARGE,
        )));
        $pokemonMeta->setNumber(145);
        self::$POKEMON_META[PokemonId::ZAPDOS] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0146_POKEMON_MOLTRES");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MOLTRES);
        $pokemonMeta->setPokemonClass(PokemonClass::LEGENDARY);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(2);
        $pokemonMeta->setHeightStdDev(0.25);
        $pokemonMeta->setBaseStamina(180);
        $pokemonMeta->setCylRadiusM(0.62);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(242);
        $pokemonMeta->setDiskRadiusM(0.93);
        $pokemonMeta->setCollisionRadiusM(0.403);
        $pokemonMeta->setPokedexWeightKg(60);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_FIRE);
        $pokemonMeta->setCollisionHeadRadiusM(0.217);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.62);
        $pokemonMeta->setUniqueId("V0146_POKEMON_MOLTRES");
        $pokemonMeta->setBaseDefense(194);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(7.5);
        $pokemonMeta->setCylHeightM(1.395);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.93);
        $pokemonMeta->setShoulderModeScale(0.25);
        $pokemonMeta->setBaseCaptureRate(0.00);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.93);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::EMBER_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::FLAMETHROWER,
            PokemonMove::HEAT_WAVE,
            PokemonMove::FIRE_BLAST,
        )));
        $pokemonMeta->setNumber(146);
        self::$POKEMON_META[PokemonId::MOLTRES] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0147_POKEMON_DRATINI");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DRATINI);
        $pokemonMeta->setPokemonClass(PokemonClass::UNCOMMON);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(1.8);
        $pokemonMeta->setHeightStdDev(0.225);
        $pokemonMeta->setBaseStamina(82);
        $pokemonMeta->setCylRadiusM(0.2775);
        $pokemonMeta->setBaseFleeRate(0.09);
        $pokemonMeta->setBaseAttack(128);
        $pokemonMeta->setDiskRadiusM(0.4163);
        $pokemonMeta->setCollisionRadiusM(0.2775);
        $pokemonMeta->setPokedexWeightKg(3.3);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_DRAGON);
        $pokemonMeta->setCollisionHeadRadiusM(0.19425);
        $pokemonMeta->setMovementTimerS(10);
        $pokemonMeta->setJumpTimeS(0.85);
        $pokemonMeta->setModelScale(1.11);
        $pokemonMeta->setUniqueId("V0147_POKEMON_DRATINI");
        $pokemonMeta->setBaseDefense(110);
        $pokemonMeta->setAttackTimerS(29);
        $pokemonMeta->setWeightStdDev(0.4125);
        $pokemonMeta->setCylHeightM(0.8325);
        $pokemonMeta->setCandyToEvolve(25);
        $pokemonMeta->setCollisionHeightM(0.555);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.32);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::DRAGON_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::TWISTER,
            PokemonMove::WRAP,
            PokemonMove::AQUA_TAIL,
        )));
        $pokemonMeta->setNumber(147);
        self::$POKEMON_META[PokemonId::DRATINI] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0148_POKEMON_DRAGONAIR");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DRATINI);
        $pokemonMeta->setPokemonClass(PokemonClass::RARE);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(4);
        $pokemonMeta->setHeightStdDev(0.5);
        $pokemonMeta->setBaseStamina(122);
        $pokemonMeta->setCylRadiusM(0.5625);
        $pokemonMeta->setBaseFleeRate(0.06);
        $pokemonMeta->setBaseAttack(170);
        $pokemonMeta->setDiskRadiusM(0.8438);
        $pokemonMeta->setCollisionRadiusM(0.375);
        $pokemonMeta->setPokedexWeightKg(16.5);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_DRAGON);
        $pokemonMeta->setCollisionHeadRadiusM(0.28125);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.25);
        $pokemonMeta->setModelScale(0.75);
        $pokemonMeta->setUniqueId("V0148_POKEMON_DRAGONAIR");
        $pokemonMeta->setBaseDefense(152);
        $pokemonMeta->setAttackTimerS(23);
        $pokemonMeta->setWeightStdDev(2.0625);
        $pokemonMeta->setCylHeightM(1.5);
        $pokemonMeta->setCandyToEvolve(100);
        $pokemonMeta->setCollisionHeightM(1.125);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.08);
        $pokemonMeta->setParentId(PokemonId::DRATINI);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::DRAGON_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::WRAP,
            PokemonMove::AQUA_TAIL,
            PokemonMove::DRAGON_PULSE,
        )));
        $pokemonMeta->setNumber(148);
        self::$POKEMON_META[PokemonId::DRAGONAIR] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0149_POKEMON_DRAGONITE");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_DRATINI);
        $pokemonMeta->setPokemonClass(PokemonClass::EPIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_FLYING);
        $pokemonMeta->setPokedexHeightM(2.2);
        $pokemonMeta->setHeightStdDev(0.275);
        $pokemonMeta->setBaseStamina(182);
        $pokemonMeta->setCylRadiusM(0.42);
        $pokemonMeta->setBaseFleeRate(0.05);
        $pokemonMeta->setBaseAttack(250);
        $pokemonMeta->setDiskRadiusM(0.63);
        $pokemonMeta->setCollisionRadiusM(0.42);
        $pokemonMeta->setPokedexWeightKg(210);
        $pokemonMeta->setMovementType(MovementType::FLYING);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_DRAGON);
        $pokemonMeta->setCollisionHeadRadiusM(0.245);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(0.7);
        $pokemonMeta->setUniqueId("V0149_POKEMON_DRAGONITE");
        $pokemonMeta->setBaseDefense(212);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(26.25);
        $pokemonMeta->setCylHeightM(1.47);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.05);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0.04);
        $pokemonMeta->setParentId(PokemonId::DRAGONAIR);
        $pokemonMeta->setCylGroundM(0.595);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::STEEL_WING_FAST,
            PokemonMove::DRAGON_BREATH_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::DRAGON_CLAW,
            PokemonMove::HYPER_BEAM,
            PokemonMove::DRAGON_PULSE,
        )));
        $pokemonMeta->setNumber(149);
        self::$POKEMON_META[PokemonId::DRAGONITE] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0150_POKEMON_MEWTWO");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MEWTWO);
        $pokemonMeta->setPokemonClass(PokemonClass::LEGENDARY);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(2);
        $pokemonMeta->setHeightStdDev(0.25);
        $pokemonMeta->setBaseStamina(212);
        $pokemonMeta->setCylRadiusM(0.37);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(284);
        $pokemonMeta->setDiskRadiusM(0.555);
        $pokemonMeta->setCollisionRadiusM(0.37);
        $pokemonMeta->setPokedexWeightKg(122);
        $pokemonMeta->setMovementType(MovementType::JUMP);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.185);
        $pokemonMeta->setMovementTimerS(8);
        $pokemonMeta->setJumpTimeS(1.2);
        $pokemonMeta->setModelScale(0.74);
        $pokemonMeta->setUniqueId("V0150_POKEMON_MEWTWO");
        $pokemonMeta->setBaseDefense(202);
        $pokemonMeta->setAttackTimerS(3);
        $pokemonMeta->setWeightStdDev(15.25);
        $pokemonMeta->setCylHeightM(1.48);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(1.184);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::CONFUSION_FAST,
            PokemonMove::PSYCHO_CUT_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::PSYCHIC,
            PokemonMove::SHADOW_BALL,
            PokemonMove::HYPER_BEAM,
        )));
        $pokemonMeta->setNumber(150);
        self::$POKEMON_META[PokemonId::MEWTWO] = $pokemonMeta;

        $pokemonMeta = new PokemonMeta();
        $pokemonMeta->setTemplateId("V0151_POKEMON_MEW");
        $pokemonMeta->setFamily(PokemonFamilyId::FAMILY_MEWTWO);
        $pokemonMeta->setPokemonClass(PokemonClass::MYTHIC);
        $pokemonMeta->setType2(PokemonType::POKEMON_TYPE_NONE);
        $pokemonMeta->setPokedexHeightM(0.4);
        $pokemonMeta->setHeightStdDev(0.05);
        $pokemonMeta->setBaseStamina(200);
        $pokemonMeta->setCylRadiusM(0.282);
        $pokemonMeta->setBaseFleeRate(0.1);
        $pokemonMeta->setBaseAttack(220);
        $pokemonMeta->setDiskRadiusM(0.423);
        $pokemonMeta->setCollisionRadiusM(0.141);
        $pokemonMeta->setPokedexWeightKg(4);
        $pokemonMeta->setMovementType(MovementType::PSYCHIC);
        $pokemonMeta->setType1(PokemonType::POKEMON_TYPE_PSYCHIC);
        $pokemonMeta->setCollisionHeadRadiusM(0.17625);
        $pokemonMeta->setMovementTimerS(3);
        $pokemonMeta->setJumpTimeS(1);
        $pokemonMeta->setModelScale(1.41);
        $pokemonMeta->setUniqueId("V0151_POKEMON_MEW");
        $pokemonMeta->setBaseDefense(220);
        $pokemonMeta->setAttackTimerS(8);
        $pokemonMeta->setWeightStdDev(0.5);
        $pokemonMeta->setCylHeightM(0.7755);
        $pokemonMeta->setCandyToEvolve(0);
        $pokemonMeta->setCollisionHeightM(0.564);
        $pokemonMeta->setShoulderModeScale(0.5);
        $pokemonMeta->setBaseCaptureRate(0);
        $pokemonMeta->setParentId(PokemonId::MISSINGNO);
        $pokemonMeta->setCylGroundM(0.0705);
        $pokemonMeta->setQuickMoves(new PokemonMoveData(array(
            PokemonMove::POUND_FAST,
        )));
        $pokemonMeta->setCinematicMoves(new PokemonMoveData(array(
            PokemonMove::MOONBLAST,
            PokemonMove::FIRE_BLAST,
            PokemonMove::SOLAR_BEAM,
            PokemonMove::HYPER_BEAM,
            PokemonMove::PSYCHIC,
            PokemonMove::HURRICANE,
            PokemonMove::EARTHQUAKE,
            PokemonMove::DRAGON_PULSE,
            PokemonMove::THUNDER,
        )));
        $pokemonMeta->setNumber(151);
        self::$POKEMON_META[PokemonId::MEW] = $pokemonMeta;

    }

}

PokemonMetaRegistry::initialize();