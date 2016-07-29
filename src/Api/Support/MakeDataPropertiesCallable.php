<?php

namespace NicklasW\PkmGoApi\Api\Support;

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
