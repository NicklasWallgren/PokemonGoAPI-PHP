<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method integer setState(array $state)
 *
 * @method integer getState()
 */
class TutorialState extends Data {

    /**
     * @var array
     */
    protected $state;

    /**
     * Creates a TutorialState instance.
     *
     * @param array $tutorialState
     * @return static
     */
    public static function create($tutorialState)
    {
        $instance = new static();
        $instance->setState($tutorialState);

        return $instance;
    }


}