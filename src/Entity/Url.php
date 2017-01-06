<?php

namespace Jedkirby\TweetEntityLinker\Entity;

class Url extends AbstractEntity
{

    /**
     * {@inhertDoc}
     */
    public function getRequiredProperties()
    {
        return ['url', 'display_url'];
    }

    /**
     * {@inhertDoc}
     */
    public function getSearchText()
    {
        return $this->data['url'];
    }

    /**
     * {@inhertDoc}
     */
    public function getHtml()
    {
        return sprintf(
            '<a href="%s" target="_blank">%s</a>',
            $this->data['url'],
            $this->data['display_url']
        );
    }

}
