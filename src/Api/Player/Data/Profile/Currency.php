<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setName(string $state)
 * @method void setAmount(intger $state)
 *
 * @method string getName()
 * @method integer getAmount()
 */
class Currency extends Data {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $amount;

}