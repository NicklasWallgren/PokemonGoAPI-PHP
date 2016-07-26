<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Data\Player\Currency as PlayerCurrency;

/**
 * @method integer setState(array $state)
 * 
 * @method integer getState()
 */
class Currencies extends Data {

    /**
     * @var array
     */
    protected $currencies;

    /**
     * Creates a TutorialState instance.
     *
     * @param PlayerCurrency[] $currencies
     * @return static
     */
    public static function create($currencies)
    {
        $instance = new static();

        foreach ($currencies as $playerCurrency) {
            $currency = new Currency();

            $currency->setName($playerCurrency->getName());
            $currency->setAmount($playerCurrency->getAmount());

            $instance->currencies[] = $currency;
        }

        return $instance;
    }


}