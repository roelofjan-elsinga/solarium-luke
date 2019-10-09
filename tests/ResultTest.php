<?php


use Solarium\QueryType\Luke\Query;
use Solarium\QueryType\Luke\Result;

class ResultTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Result $result
     */
    private $result;

    public function setUp(): void
    {
        parent::setUp();

        $luke_response = file_get_contents(getcwd() . '/tests/luke_response.json');

        $response = new \Solarium\Core\Client\Response($luke_response, ['HTTP 200 OK']);

        $this->result = new Result(new Query(), $response);
    }

    public function test_count_can_be_retrieved_from_response()
    {
        $this->assertSame(100000, $this->result->count());
    }

    public function test_current_can_be_retrieved_from_response()
    {
        $this->assertFalse($this->result->getCurrent());
    }

    public function test_directory_can_be_retrieved_from_response()
    {
        $this->assertSame(
            "org.apache.lucene.store.NRTCachingDirectory:NRTCachingDirectory(MMapDirectory@/opt/solr/server/solr/mycores/cores/core_name/data/index lockFactory=org.apache.lucene.store.NativeFSLockFactory@53bbf2d3; maxCacheMB=48.0 maxMergeSizeMB=4.0)",
            $this->result->getDirectory()
        );
    }

    public function test_has_deletions_can_be_retrieved_from_response()
    {
        $this->assertTrue($this->result->getHasDeletions());
    }

    public function test_last_modified_can_be_retrieved_from_response()
    {
        $this->assertSame("2019-09-18T13:26:57.819Z", $this->result->getLastModified());
    }

    public function test_max_doc_can_be_retrieved_from_response()
    {
        $this->assertSame(200000, $this->result->getMaxDoc());
    }

    public function test_segment_count_can_be_retrieved_from_response()
    {
        $this->assertSame(40, $this->result->getSegmentCount());
    }

    public function test_version_can_be_retrieved_from_response()
    {
        $this->assertSame(100000, $this->result->getVersion());
    }

    public function test_note_can_be_retrieved_from_response()
    {
        $this->assertSame(
            "Document Frequency (df) is not updated when a document is marked for deletion.  df values include deleted documents.",
            $this->result->getNote()
        );
    }

    public function test_key_can_be_retrieved_from_response()
    {
        $this->assertSame('Indexed', $this->result->getKey()['I']);
    }

    public function test_query_time_can_be_retrieved_from_response()
    {
        $this->assertSame(79, $this->result->getQueryTime());
    }

    public function test_status_can_be_retrieved_from_response()
    {
        $this->assertSame(0, $this->result->getStatus());
    }

    public function test_fields_can_be_retrieved_from_response()
    {
        $this->assertSame(
            \Solarium\QueryType\Luke\FieldSet::class,
            get_class($this->result->getFields())
        );
    }

}