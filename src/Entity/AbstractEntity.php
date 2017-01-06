<?php

namespace Jedkirby\TweetEntityLinker\Entity;

use Jedkirby\TweetEntityLinker\Entity\Exception\RequiredPropertyException;

abstract class AbstractEntity implements EntityInterface
{

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
        $this->validate();
    }

    /**
     * @throws RequiredPropertyException
     * @return void
     */
    private function validate()
    {

        $requiredProperties = $this->getRequiredProperties();
        $missingProperties = array_diff(
            $requiredProperties,
            array_keys($this->data)
        );

        if ($missingProperties) {
            throw new RequiredPropertyException(sprintf(
                'The following properties "%s" are required for the entity "%s".',
                implode(', ', $requiredProperties),
                get_called_class()
            ));
        }

    }

}
