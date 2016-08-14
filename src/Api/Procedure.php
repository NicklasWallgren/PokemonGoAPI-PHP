<?php


namespace NicklasW\PkmGoApi\Api;

use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Api\Support\MakeApiResourcesAvailable;
use NicklasW\PkmGoApi\Services\RequestService;

abstract class Procedure {

    use MakeApiResourcesAvailable;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * Update the data.
     */
    public function update()
    {

    }

    /**
     * Returns the data.
     *
     * @returns Data
     */
    public function getData()
    {
        // Check if the data is available since earlier
        if ($this->data === null) {
            $this->update();
        }

        return $this->data;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        // Check if the data is defined
        if ($this->data == null) {
            $this->update();
        }

        return $this->data->{$name}($arguments);
    }

    /**
     * Returns the request service.
     *
     * @return RequestService
     */
    protected function getRequestService()
    {
        return $this->getPokemonGoApi()->getRequestService();
    }


}