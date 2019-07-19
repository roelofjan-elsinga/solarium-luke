<?php

/**
 * Luke request handler for Solarium.
 */

namespace Solarium\QueryType\Luke;

use Solarium\Core\Query\AbstractQuery as BaseQuery;
use Solarium\Core\Query\QueryInterface;
use Solarium\Core\Query\ResponseParserInterface;
use Solarium\Core\Query\RequestBuilderInterface;
use Solarium\Core\Query\Result\QueryType;

/**
 * Luke query
 *
 * Use a Luke query to get statistics about the Solr instance.
 */
class Query extends BaseQuery implements QueryInterface
{
    /**
     * @var Querytype luke
     */
    const QUERY_LUKE = 'luke';

    /**
     * Default options for the "Luke" query type.
     *
     * @var array
     */
    protected $options = [
        'resultclass' => Result::class,
        'handler' => 'admin/luke',
    ];

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
    public function getRequestBuilder(): RequestBuilderInterface
    {
        return new RequestBuilder();
    }

    /**
     * Get the response parser class for this query.
     *
     * @return ResponseParserInterface|null
     */
    public function getResponseParser(): ?ResponseParserInterface
    {
        return new ResponseParser();
    }
}
