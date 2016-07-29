<?php

namespace NicklasW\PkmGoApi\Api\Map\Support;

use S2\S2CellId;
use S2\S2LatLng;

class S2 {

    /**
     * Returns a list of cell ids for latitue and longitude.
     *
     * @param double $latitude
     * @param double $longitude
     * @param int    $width
     * @return array
     */
    public static function getCellIds($latitude, $longitude, $width = 9)
    {
        // Create s2 instance from latitude and longitude
        $s2latLng = S2LatLng::fromDegrees($latitude, $longitude);

        // Get s2 cell id from latitude and longitude
        $cellId = S2CellId::fromLatLng($s2latLng)->parent(15);

        // Calculate the size
        $size = 1 * (2 ** (S2CellId::MAX_LEVEL - $cellId->level()));

        $index = 0;
        $jindex = 0;

        $face = $cellId->toFaceIJOrientation($index, $jindex);

        $cells = array();

        $halfWidth = (int)floor($width / 2);

        for ($x = -$halfWidth; $x <= $halfWidth; $x++) {
            for ($y = -$halfWidth; $y <= $halfWidth; $y++) {
                $s2CellID = S2CellId::fromFaceIJ($face, $index + $x * $size, $jindex + $y * $size);

                $cells[] = $s2CellID->parent(15)->id();
            }
        }

        return $cells;
    }

}