<?php

namespace Tests\Jedkirby\TweetEntityLinker\Entity;

use Jedkirby\TweetEntityLinker\Tweet;
use PHPUnit_Framework_TestCase as TestCase;
use Tests\Jedkirby\TweetEntityLinker\Entity\Fixtures\Sample;

class EntityTest extends TestCase
{

    /**
     * @test
     */
    public function itUsesTheDefaultValueWhenGettingDataItem()
    {

        $entity = new Sample(false);

        $this->assertEquals(
            $entity->getSearchText(),
            'default'
        );

    }


}