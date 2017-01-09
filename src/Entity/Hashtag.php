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
     * {@inhertdoc}.
     */
    public function getRequiredProperties()
    {
        return ['text'];
    }

    /**
     * {@inhertdoc}.
     */
    public function getSearchText()
    {
        return $this->getEntityKey() . $this->data['text'];
    }

    /**
     * {@inhertdoc}.
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
