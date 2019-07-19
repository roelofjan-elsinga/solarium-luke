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
     * @param $property
     * @return mixed
     */
    public function returnProperty($property)
    {
        $this->parseResponse();

        return $this->$property;
    }

    /**
     * @return int|mixed
     */
    public function count()
    {
        return $this->getNumDocs();
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->returnProperty('current');
    }

    /**
     * @return mixed
     */
    public function getDirectory()
    {
        return $this->returnProperty('directory');
    }

    /**
     * @return mixed
     */
    public function getHasDeletions()
    {
        return $this->returnProperty('hasDeletions');
    }

    /**
     * @return mixed
     */
    public function getLastModified()
    {
        return $this->returnProperty('lastModified');
    }

    /**
     * @return mixed
     */
    public function getMaxDoc()
    {
        return $this->returnProperty('maxDoc');
    }

    /**
     * @return mixed
     */
    public function getNumDocs()
    {
        return $this->returnProperty('numDocs');
    }

    /**
     * @return mixed
     */
    public function getSegmentCount()
    {
        return $this->returnProperty('segmentCount');
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->returnProperty('version');
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->returnProperty('NOTE');
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->returnProperty('key');
    }

    /**
     * @return mixed
     */
    public function getQueryTime()
    {
        return $this->returnProperty('QTime');
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->returnProperty('status');
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->returnProperty('fields');
    }
}
