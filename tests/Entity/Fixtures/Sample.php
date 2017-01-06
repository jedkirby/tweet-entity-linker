<?php

namespace Tests\Jedkirby\TweetEntityLinker\Entity\Fixtures;

use Jedkirby\TweetEntityLinker\Entity\AbstractEntity;

class Sample extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->getDataItem('key', 'default');
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return '';
    }

}
