<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Profile;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setSkin(int $skin)
 * @method void setHair(int $hair)
 * @method void setShirt(int $shirt)
 * @method void setPants(int $pants)
 * @method void setHat(int $hat)
 * @method void setShoes(int $shoes)
 * @method void setGender(int $gender)
 * @method void setEyes(int $eyes)
 * @method void setBackpack(int $backpack)
 *
 * @method integer getSkin()
 * @method integer getHair()
 * @method integer getShirt()
 * @method integer getPants()
 * @method integer getHat()
 * @method integer getShoes()
 * @method integer getGender()
 * @method integer getEyes()
 * @method integer getBackpack()
 */
class Avatar extends Data {

    /**
     * @var integer
     */
    protected $skin;

    /**
     * @var integer
     */
    protected $hair;

    /**
     * @var integer
     */
    protected $shirt;

    /**
     * @var integer
     */
    protected $pants;

    /**
     * @var integer
     */
    protected $hat;

    /**
     * @var integer
     */
    protected $shoes;

    /**
     * @var integer
     */
    protected $gender;

    /**
     * @var integer
     */
    protected $eyes;

    /**
     * @var integer
     */
    protected $backpack;

}