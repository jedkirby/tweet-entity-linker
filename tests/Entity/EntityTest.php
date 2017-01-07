<?php

namespace Tests\Jedkirby\TweetEntityLinker\Entity;

use PHPUnit_Framework_TestCase as TestCase;
use Tests\Jedkirby\TweetEntityLinker\Entity\Fixtures\InvalidProperties;
use Tests\Jedkirby\TweetEntityLinker\Entity\Fixtures\NoRequiredProperties;

class EntityTest extends TestCase
{
    /**
     * @test
     * @expectedException \Jedkirby\TweetEntityLinker\Entity\Exception\RequiredPropertyException
     */
    public function itMustHaveRequiredProperties()
    {
        $entity = new InvalidProperties();
    }

    /**
     * @test
     */
    public function itDoesNotNeedToHaveRequiredProperties()
    {
        $entity = new NoRequiredProperties();
    }
}
