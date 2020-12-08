<?php


use Solarium\Client;
use Symfony\Component\EventDispatcher\EventDispatcher;

class RequestBuilderTest extends \PHPUnit\Framework\TestCase
{
    public function test_custom_request_builder_adds_stuff()
    {
        $client = new Client(new MyAdapter(), new EventDispatcher());

        $request = $client->createRequest(new \Solarium\QueryType\Luke\Query());

        $this->assertSame(0, $request->getParam('numTerms'));
        $this->assertTrue(in_array('map', $request->getParam('json.nl')));
    }
}
