<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class Url extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->getDataItem('url');
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return sprintf(
            '<a href="%s" target="_blank">%s</a>',
            $this->getDataItem('url'),
            $this->getDataItem('display_url')
        );
    }

}
