<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class UserMention extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->getDataItem('screen_name');
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return sprintf(
            '<a href="https://twitter.com/%s" target="_blank">%s</a>',
            $this->getDataItem('screen_name'),
            $this->getDataItem('screen_name')
        );
    }

}
