<?php

/**
 * ResponseData base class that can be used for the data returned by the REST API.
 * Extends from CModel and thus provides error handling and data validation if necessary.
 */
abstract class ResponseData extends CModel
{
    /**
     * @inheritdoc
     */
    public function attributeNames()
    {
        $names = array();
        $class = new ReflectionClass($this);
        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $names[] = $property->name;
        }
        return $names;
    }
}