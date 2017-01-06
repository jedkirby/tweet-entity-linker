<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class UserMention extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getRequiredProperties()
    {
        return ['screen_name'];
    }

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->data['screen_name'];
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return sprintf(
            '<a href="https://twitter.com/%s" target="_blank">%s</a>',
            $this->data['screen_name'],
            $this->data['screen_name']
        );
    }

}
