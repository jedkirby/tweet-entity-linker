<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class Hashtag extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->getDataItem('text');
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return sprintf(
            '<a href="https://twitter.com/hashtag/%s" target="_blank">%s</a>',
            $this->getDataItem('text'),
            $this->getDataItem('text')
        );
    }

}
