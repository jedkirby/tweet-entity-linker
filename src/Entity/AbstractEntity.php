<?php

namespace Jedkirby\TweetEntityLinker\Entity;

abstract class AbstractEntity implements EntityInterface
{

    /**
     * @var stdClass
     */
    private $data;

    /**
     * @param stdClass $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Return a data item whether it's within an array or an object.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    protected function getDataItem($key, $default = '')
    {
        if (is_object($this->data)) {
            return $this->data->$key;
        } elseif (is_array($this->data)) {
            return $this->data[$key];
        } else {
            return $default;
        }
    }

}
