<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class Hashtag extends AbstractEntity
{
    /**
     * @return string
     */
    private function getEntityKey()
    {
        return '#';
    }

    /**
     * {@inhertDoc}.
     */
    public function getRequiredProperties()
    {
        return ['text'];
    }

    /**
     * {@inhertDoc}.
     */
    public function getSearchText()
    {
        return $this->getEntityKey() . $this->data['text'];
    }

    /**
     * {@inhertDoc}.
     */
    public function getHtml()
    {
        return sprintf(
            '%s<a href="https://twitter.com/hashtag/%s" target="_blank">%s</a>',
            $this->getEntityKey(),
            $this->data['text'],
            $this->data['text']
        );
    }
}
