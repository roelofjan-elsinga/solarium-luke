<?php


use Solarium\QueryType\Luke\Field;
use Solarium\QueryType\Luke\FieldSet;
use Solarium\QueryType\Luke\Query;
use Solarium\QueryType\Luke\ResponseParser;
use Solarium\QueryType\Luke\Result;

class FieldTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var Result $result
     */
    private $result;
    /**
     * @var ResponseParser $response_parser
     */
    private $response_parser;
    /**
     * @var array $fields
     */
    private $fields;
    /**
     * @var FieldSet $field_set
     */
    private $field_set;

    public function setUp(): void
    {
        parent::setUp();

        $luke_response = file_get_contents(getcwd() . '/tests/luke_response.json');

        $response = new \Solarium\Core\Client\Response($luke_response, ['HTTP 200 OK']);

        $this->result = new Result(new Query(), $response);

        $this->response_parser = new ResponseParser();

        $parsed_response = $this->response_parser->parse($this->result);

        $this->field_set = $parsed_response['fields'];

        $this->fields = $this->field_set->getFields();
    }

    public function test_can_get_name_of_field()
    {
        $this->assertSame('id', $this->fields['id']->getName());
    }

    public function test_can_get_schema_of_field()
    {
        $this->assertSame('I--DU-----OF-----l', $this->fields['id']->getSchema());
    }

    public function test_can_get_type_of_field()
    {
        $this->assertSame('string', $this->fields['id']->getType());
    }

    public function test_can_get_dynamic_base_of_field()
    {
        $this->assertSame(false, $this->fields['id']->getDynamicBase());
    }

    public function test_can_get_is_dynamic_of_field()
    {
        $this->assertSame(false, $this->fields['id']->isDynamic());
    }

    public function test_can_get_top_terms_of_field()
    {
        $this->assertSame(['1', 5000, '2', 2500, '3', 1000, '4', 750, '5', 750], $this->fields['id']->getTopTerms());
    }

    public function test_dynamic_base_field_is_reported_as_dynamic()
    {
        $this->assertTrue($this->fields['dynamic_id']->isDynamic());
    }

    public function test_get_fields_through_field_set_iterator()
    {
        $field = $this->field_set->getIterator()->current();

        $this->assertSame(Field::class, get_class($field));
    }

    public function test_can_get_field_through_getter()
    {
        $field = $this->field_set->id;

        $this->assertSame(Field::class, get_class($field));
    }

    public function test_cannot_get_non_existing_field_from_field_set()
    {
        $this->expectExceptionMessage('Field "testing_id" does not exist.');

        $this->field_set->testing_id;
    }
}
