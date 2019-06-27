<?php

/**
 *
 */

namespace Solarium\QueryType\Luke;

/**
 *
 */
class FieldSet implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $_fields;

    /**
     *
     */
    public function __construct(array $fields)
    {
        return $this->_fields = $fields;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @return Field|false
     */
    public function getField($field_name)
    {
        return isset($this->_fields[$field_name]) ? $this->_fields[$field_name] : false;
    }

    /**
     *
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->_fields);
    }

    /**
     * @return Field
     */
    public function __get($name)
    {
        if (!$field = $this->getField($name)) {
            throw new \RuntimeException('Field "' . $name . '" does not exist.');
        }
        return $field;
    }
}