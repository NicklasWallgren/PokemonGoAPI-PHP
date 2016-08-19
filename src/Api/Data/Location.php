<?php

namespace NicklasW\PkmGoApi\Api\Data;

/**
 * @method void setLatitude(double $latitude)
 * @method void setLongitude(double $longitude)
 *
 * @method double getLatitude()
 * @method double getLongitude()
 */
class Location extends Data {

    /**
     * @var double
     */
    protected $latitude;

    /**
     * @var double
     */
    protected $longitude;

    /**
     * Location constructor.
     *
     * @param double $latitude
     * @param double $longitude
     */
    public function __construct($latitude = 0.0, $longitude = 0.0)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

}