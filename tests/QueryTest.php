<?php


use Solarium\Client;
use Solarium\Core\Client\Adapter\Http;
use Solarium\Core\Client\Endpoint;
use Solarium\Core\Client\Request;
use Solarium\Core\Client\Response;
use Solarium\QueryType\Luke\Query;
use Solarium\QueryType\Luke\Result;
use Solarium\QueryType\Luke\FieldSet;
use Symfony\Component\EventDispatcher\EventDispatcher;

class QueryTest extends \PHPUnit\Framework\TestCase
{

    /**@var Client $client*/
    private $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client(new MyAdapter(), new EventDispatcher());
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

class MyAdapter extends Http
{
    public function execute(Request $request, Endpoint $endpoint): Response
    {
        return new Response('{}', ['HTTP/1.1 200 OK']);
    }
}
