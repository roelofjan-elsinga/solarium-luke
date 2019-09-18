<?php


use Solarium\Client;
use Solarium\QueryType\Luke\Query;
use Solarium\QueryType\Luke\Result;
use Solarium\QueryType\Luke\FieldSet;

class QueryTest extends \PHPUnit\Framework\TestCase
{

    /**@var Client $client*/
    private $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();
    }

    public function testLukeQueryCanBeRegistered()
    {
        $this->client->registerQueryType(Query::QUERY_LUKE, Query::class);

        $this->assertArrayHasKey(Query::QUERY_LUKE, $this->client->getQueryTypes());
    }

    public function testLukeQueriesCanBeExecuted()
    {
        $this->client->registerQueryType(Query::QUERY_LUKE, Query::class);

        $query = $this->client->createQuery(Query::QUERY_LUKE);

        $this->assertSame('luke', $query->getType());
    }

    public function testTopTermsCanBeRetrievedFromResponse()
    {
        $luke_response = file_get_contents(getcwd() . '/tests/luke_response.json');

        $response = new \Solarium\Core\Client\Response($luke_response, ['HTTP 200 OK']);

        $parser = new \Solarium\QueryType\Luke\ResponseParser();

        $mock_search_result = new Result(new Query(), $response);

        $parsed_result = $parser->parse($mock_search_result);

        $this->assertSame(FieldSet::class, get_class($parsed_result['fields']));

        $top_terms = $parsed_result['fields']->getField('id')->getTopTerms();

        $this->assertSame(10, count($top_terms));

        $this->assertSame('1', $top_terms[0]);

        $this->assertSame(5000, $top_terms[1]);
    }

}