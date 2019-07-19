<?php

/**
 *
 */

namespace Solarium\QueryType\Luke;

use ArrayIterator;
use IteratorAggregate;

class FieldSet implements IteratorAggregate
{
    /**
     * @var array
     */
    protected $_fields;

    /**
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->_fields = $fields;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->_fields;
    }

    /**
     * @param string $field_name
     * @return Field|false
     */
    public function getField($field_name)
    {
        return isset($this->_fields[$field_name]) ? $this->_fields[$field_name] : false;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->_fields);
    }
    /**
     * @param string $name
     * @return Field
     */
    public function __get(string $name)
    {
        if (!$field = $this->getField($name)) {
            throw new \RuntimeException('Field "' . $name . '" does not exist.');
        }
        return $field;
    }
}