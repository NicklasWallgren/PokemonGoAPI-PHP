<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use Exception;
use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Data\Player\Currency as PlayerCurrency;

/**
 * @method integer setCurrencies(array $state)
 * @method integer getCurrencies()
 */
class Currencies extends Data {

    /**
     * @var string The pokecoin currency type
     */
    const CURRENCY_TYPE_POKECOIN = 'POKECOIN';

    /**
     * @var string The stardust currency type
     */
    const CURRENCY_TYPE_STARDUST = 'STARDUST';

    /**
     * @var Currency[]
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

            $instance->currencies[$playerCurrency->getName()] = $currency;
        }

        return $instance;
    }

    /**
     * Returns the currency by currency type.
     *
     * @param string $type
     * @return Currency
     * @throws Exception
     */
    public function getByType($type)
    {
        // Check if the provided type is a valid currency type
        if (!array_key_exists($type, $this->currencies)) {
            throw new Exception('Invalid currency type provided');
        }

        return $this->currencies[$type];
    }

    /**
     * Returns the pokecoins currency.
     *
     * @return Currency
     * @throws Exception
     */
    public function getPokecoins()
    {
        return $this->getByType(self::CURRENCY_TYPE_POKECOIN);
    }

    /**
     * Returns stardust currency.
     *
     * @return Currency
     * @throws Exception
     */
    public function getStardust()
    {
        return $this->getByType(self::CURRENCY_TYPE_STARDUST);
    }

    /**
     * Returns all currency types.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->currencies;
    }

}