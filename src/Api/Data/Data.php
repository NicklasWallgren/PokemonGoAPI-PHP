<?php


namespace NicklasW\PkmGoApi\Api\Data;

use ProtobufMessage;
use ReflectionClass;

abstract class Data {

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param ProtobufMessage $data
     * @return static
     */
    public static function create($data)
    {
        // Check if we retrieved valid data
        if ($data == null) {
            return;
        }

        $instance = new static();

        // Retrieve the properties within the protobuf message class
        $dataProperties = self::getClassProperties($data);

        // Retrieve the properties within the data class
        $properties = self::getClassDefaultProperties($instance);

        foreach ($dataProperties as $property) {
            // Retrieve the property name
            $propertyName = camel_case($property->getName());

            // Check if the same property exists within the data class
            if (!array_key_exists($propertyName, $properties)) {
                continue;
            }

            // Sets the property value
            $instance->{'set' . $propertyName}($data->{'get' . $propertyName}());
        }

        return $instance;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        if ($this->isSetMethod($name)) {
            $attribute = $this->getAttribute($name);

            $this->{$attribute} = current($arguments);

        } elseif ($this->isGetMethod($name)) {
            $attribute = $this->getAttribute($name);

            return $this->{$attribute};
        }
    }

    /**
     * Returns the class properties of a class.
     *
     * @param mixed $instance
     * @return array
     */
    protected static function getClassProperties($instance)
    {
        $reflection = new ReflectionClass($instance);

        return $reflection->getProperties();
    }

    /**
     * Returns the class properties of a class.
     *
     * @param mixed $instance
     * @return array
     */
    protected static function getClassDefaultProperties($instance)
    {
        $reflection = new ReflectionClass($instance);

        return $reflection->getDefaultProperties();
    }

    /**
     * Returns the corresponding attribute.
     *
     * @param $method
     * @return string
     */
    protected function getAttribute($method)
    {
        return lcfirst(substr($method, 3));
    }

    /**
     * Returns true if the method corresponds to a setter method, false otherwise.
     *
     * @param string $method
     * @return boolean
     */
    protected function isSetMethod($method)
    {
        return strpos($method, 'set') !== FALSE;
    }

    /**
     * Returns true if the method corresponds to a getter method, false otherwise.
     *
     * @param string $method
     * @return boolean
     */
    protected function isGetMethod($method)
    {
        return strpos($method, 'get') !== FALSE;
    }


}