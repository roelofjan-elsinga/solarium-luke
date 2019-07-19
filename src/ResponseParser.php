<?php

namespace Solarium\QueryType\Luke;

use Solarium\Core\Query\AbstractResponseParser;
use Solarium\Core\Query\ResponseParserInterface;
use Solarium\Core\Query\Result\ResultInterface;

/**
 * Parse Luke response data
 */
class ResponseParser extends AbstractResponseParser implements ResponseParserInterface
{
    /**
     * Implements \Solarium\Core\Query\ResponseParserInterface::parse().
     *
     * @param ResultInterface $result
     * @return array
     */
    public function parse(ResultInterface $result): array
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
