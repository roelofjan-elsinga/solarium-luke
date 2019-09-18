<?php

namespace Solarium\QueryType\Luke;

class Field
{
    /**
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_schema;

    /**
     * @var string
     */
    protected $_type;

    /**
     * @var string|false
     */
    protected $_dynamicBase;

    /**
     * @var array
     */
    protected $_topTerms;

    /**
     * Constructor
     *
     * @param string $field_name
     * @param array $field_info
     */
    public function __construct($field_name, array $field_info)
    {
        $this->_name = $field_name;
        $this->_schema = $field_info['schema'];
        $this->_type = $field_info['type'];
        if (isset($field_info['dynamicBase'])) {
            $this->_dynamicBase = $field_info['dynamicBase'];
        } else {
            $this->_dynamicBase = false;
        }
        $this->_topTerms = $field_info['topTerms'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getSchema(): string
    {
        return $this->_schema;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->_type;
    }

    /**
     * @return string|false
     */
    public function getDynamicBase()
    {
        return $this->_dynamicBase;
    }

    /**
     * @return bool
     */
    public function isDynamic(): bool
    {
        return (bool) $this->_dynamicBase;
    }

    /**
     * @return array
     */
    public function getTopTerms()
    {
        return $this->_topTerms;
    }
}
