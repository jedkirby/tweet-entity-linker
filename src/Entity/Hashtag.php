<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class Hashtag extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getRequiredProperties()
    {
        return ['text'];
    }

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->data['text'];
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return sprintf(
            '<a href="https://twitter.com/hashtag/%s" target="_blank">%s</a>',
            $this->data['text'],
            $this->data['text']
        );
    }

}
