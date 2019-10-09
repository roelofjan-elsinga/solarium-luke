<?php


class RequestBuilderTest extends \PHPUnit\Framework\TestCase
{

    public function test_custom_request_builder_adds_stuff()
    {
        $client = new \Solarium\Client();

        $request = $client->createRequest(new \Solarium\QueryType\Luke\Query());

        $this->assertSame(0, $request->getParam('numTerms'));
        $this->assertTrue(in_array('map', $request->getParam('json.nl')));
    }

}