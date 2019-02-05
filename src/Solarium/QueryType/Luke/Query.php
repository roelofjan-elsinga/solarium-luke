<?php

/**
 * Luke request handler for Solarium.
 */

namespace Solarium\QueryType\Luke;

use Solarium\Core\Query\AbstractQuery as BaseQuery;

/**
 * Luke query
 *
 * Use a Luke query to get statistics about the Solr instance.
 */
class Query extends BaseQuery
{
    /**
     * Querytype luke
     */
    const QUERY_LUKE = 'luke';

    /**
     * Default options for the "Luke" query type.
     *
     * @var array
     */
    protected $options = array(
        'resultclass' => 'Solarium\QueryType\Luke\Result',
        'handler' => 'admin/luke',
    );

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return self::QUERY_LUKE;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestBuilder()
    {
        return new RequestBuilder();
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseParser()
    {
        return new ResponseParser();
    }
}
