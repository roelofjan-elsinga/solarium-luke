<?php

/**
 *
 */

namespace Solarium\QueryType\Luke;

use Solarium\Core\Query\Result\QueryType as BaseResult;

/**
 * Terms query result
 */
class Result extends BaseResult implements \Countable
{
    /**
     *
     */
    public function returnProperty($property)
    {
        $this->parseResponse();
        return $this->$property;
    }

    /**
     *
     */
    public function count()
    {
        return $this->getNumDocs();
    }

    // From $data['index']

    /**
     *
     */
    public function getCurrent()
    {
        return $this->returnProperty('current');
    }

    /**
     *
     */
    public function getDirectory()
    {
        return $this->returnProperty('directory');
    }

    /**
     *
     */
    public function getHasDeletions()
    {
        return $this->returnProperty('hasDeletions');
    }

    /**
     *
     */
    public function getLastModified()
    {
        return $this->returnProperty('lastModified');
    }

    /**
     *
     */
    public function getMaxDoc()
    {
        return $this->returnProperty('maxDoc');
    }

    /**
     *
     */
    public function getNumDocs()
    {
        return $this->returnProperty('numDocs');
    }

    /**
     *
     */
    public function getSegmentCount()
    {
        return $this->returnProperty('segmentCount');
    }

    /**
     *
     */
    public function getVersion()
    {
        return $this->returnProperty('version');
    }

    // From $data['into']

    /**
     *
     */
    public function getNote()
    {
        return $this->returnProperty('NOTE');
    }

    /**
     *
     */
    public function getKey()
    {
        return $this->returnProperty('key');
    }

    // From $data['responseHeader']

    /**
     *
     */
    public function getQueryTime()
    {
        return $this->returnProperty('QTime');
    }

    /**
     *
     */
    public function getStatus()
    {
        return $this->returnProperty('status');
    }

    // From $data['fields']

    /**
     *
     * @return FieldSet
     */
    public function getFields()
    {
        return $this->returnProperty('fields');
    }
}
