<?php

/**
 *
 */

namespace Solarium\QueryType\Luke;
use Solarium\Core\Query\AbstractResponseParser as ResponseParserAbstract;
use Solarium\Core\Query\ResponseParserInterface as ResponseParserInterface;

/**
 * Parse Luke response data
 */
class ResponseParser extends ResponseParserAbstract implements ResponseParserInterface
{
    /**
     * Implements \Solarium\Core\Query\ResponseParserInterface::parse().
     */
    public function parse($result)
    {
        $data = $result->getData();

        $result = array();
        $result += $data['index'];
        $result += $data['info'];
        $result += $data['responseHeader'];

        $fields = array();
        foreach ($data['fields'] as $field_name => $field_info) {
            $fields[$field_name] = new Field($field_name, $field_info);
        }
        $result['fields'] = new FieldSet($fields);

        return $this->addHeaderInfo($data, $result);
    }
}
