<?php

namespace Solarium\QueryType\Luke;

use Solarium\Core\Query\AbstractQuery;
use Solarium\Core\Query\AbstractRequestBuilder;
use Solarium\Core\Query\RequestBuilderInterface;
use Solarium\Core\Client\Request;

/**
 * Build a Luke request
 */
class RequestBuilder extends AbstractRequestBuilder implements RequestBuilderInterface
{
    /**
     * Overrides \Solarium\Core\Query\RequestBuilder::build().
     *
     * @param AbstractQuery $query
     * @return Request
     */
    public function build(AbstractQuery $query): Request
    {
        $request = parent::build($query);

        $request
            ->addParam('numTerms', 0)
            ->addParam('json.nl', 'map');

        //$request->setMethod(Request::METHOD_GET);
        return $request;
    }

}
