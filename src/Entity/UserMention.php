<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class UserMention extends AbstractEntity
{
    /**
     * @return string
     */
    private function getEntityKey()
    {
        return '@';
    }

    /**
     * {@inhertdoc}.
     */
    public function getRequiredProperties()
    {
        return ['screen_name'];
    }

    /**
     * {@inhertdoc}.
     */
    public function getSearchText()
    {
        return $this->getEntityKey() . $this->data['screen_name'];
    }

    /**
     * {@inhertdoc}.
     */
    public function getHtml()
    {
        return sprintf(
            '%s<a href="https://twitter.com/%s" target="_blank">%s</a>',
            $this->getEntityKey(),
            $this->data['screen_name'],
            $this->data['screen_name']
        );
    }
}
