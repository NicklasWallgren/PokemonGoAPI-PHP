<?php

namespace NicklasW\PkmGoApi\Api\Support\Traits;

trait MakeDataPropertiesCallable {

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        return $this->data->{$name}($arguments);
    }

}
